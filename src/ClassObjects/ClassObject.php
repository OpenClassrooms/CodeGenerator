<?php

namespace OpenClassrooms\CodeGenerator\ClassObjects;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ClassObject
{
    /**
     * @var string
     */
    private $className;

    /**
     * @var string
     */
    private $namespace;

    /**
     * @var string
     */
    private $serviceName = 'oc';

    /**
     * @var string
     */
    private $shortClassName;

    /**
     * @var bool
     */
    private $isInterface = false;

    public function __construct(string $namespace, string $shortClassName, bool $isInterface = false)
    {
        $this->className = $namespace.'\\'.$shortClassName;
        $this->namespace = $namespace;
        $this->shortClassName = $shortClassName;
        $explodedNamespace = explode('\\', $namespace);
        foreach ($explodedNamespace as $item) {
            if (!in_array($item, ['', 'BusinessRules'])) {
                $this->serviceName .= '_'.$this->toSnakeCase($item);
            }
        }
        $formattedShortClassName = str_replace('Impl', '', $shortClassName);
        $this->serviceName .= '_'.$this->toSnakeCase($formattedShortClassName);
        $this->isInterface = $isInterface;
    }

    private function toSnakeCase($str)
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $str));
    }

    /**
     * @return string
     */
    public function getClassName(): string
    {
        return $this->className;
    }

    /**
     * @return string
     */
    public function getNamespace(): string
    {
        return $this->namespace;
    }

    /**
     * @return string
     */
    public function getServiceName(): string
    {
        return $this->serviceName;
    }

    /**
     * @return string
     */
    public function getShortClassName(): string
    {
        return $this->shortClassName;
    }

    /**
     * @return bool
     */
    public function isInterface(): bool
    {
        return $this->isInterface;
    }
}
