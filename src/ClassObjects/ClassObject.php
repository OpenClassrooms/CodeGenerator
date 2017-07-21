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
    private $shortClassName;

    /**
     * @var bool
     */
    private $isAbstract = false;

    /**
     * @var bool
     */
    private $isInterface = false;

    public function __construct(
        string $namespace,
        string $shortClassName,
        bool $isInterface = false,
        bool $isAbstract = false
    ) {
        $this->className = $namespace.'\\'.$shortClassName;
        $this->namespace = $namespace;
        $this->shortClassName = $shortClassName;
        $this->isInterface = $isInterface;
        $this->isAbstract = $isAbstract;
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
        $serviceName = 'oc';
        $explodedNamespace = explode('\\', $this->namespace);
        foreach ($explodedNamespace as $item) {
            if (!in_array($item, ['', 'BusinessRules'])) {
                $serviceName .= '_'.$this->toSnakeCase($item);
            }
        }
        $formattedShortClassName = str_replace('Impl', '', $this->shortClassName);
        $serviceName .= '_'.$this->toSnakeCase($formattedShortClassName);

        return $serviceName;
    }

    private function toSnakeCase($str): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $str));
    }

    public function getRouteName(): string
    {
        $routingName = 'oc';

        $explodedNamespace = explode('\\', $this->namespace);
        foreach ($explodedNamespace as $item) {
            if (!in_array($item, ['', 'BusinessRules', 'Controller'])) {
                $routingName .= '_'.$this->toSnakeCase($item);
            }
        }
        $formattedShortClassName = str_replace('Impl', '', $this->shortClassName);
        $formattedShortClassName = str_replace('Controller', '', $formattedShortClassName);
        $routingName .= '_'.$this->toSnakeCase($formattedShortClassName);

        return $routingName;
    }

    /**
     * @return string
     */
    public function getShortClassName(): string
    {
        return $this->shortClassName;
    }
}
