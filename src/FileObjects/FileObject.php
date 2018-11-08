<?php

namespace OpenClassrooms\CodeGenerator\FileObjects;

use OpenClassrooms\CodeGenerator\ClassObjects\FieldObject;
use OpenClassrooms\CodeGenerator\Utility\ClassNameUtility;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class FileObject
{
    use ClassNameUtility {
        getNamespace as getNamespaceFromClassNameUtility;
    }

    /**
     * @var bool
     */
    private $alreadyExists = false;

    /**
     * @var string
     */
    private $className;

    /**
     * @var string
     */
    private $content;

    /**
     * @var FieldObject[]
     */
    private $fields = [];

    public function setAlreadyExists(bool $alreadyExists)
    {
        $this->alreadyExists = $alreadyExists;

        return $this;
    }

    public function alreadyExists(): bool
    {
        return $this->alreadyExists;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content)
    {
        $this->content = $content;

        return $this;
    }

    public function getId(): string
    {
        return $this->className;
    }

    public function getShortClassName(): string
    {
        return $this->getShortClassNameFromClassName($this->getClassName());
    }

    public function getClassName(): string
    {
        return $this->className;
    }

    public function setClassName(string $className)
    {
        $this->className = $className;

        return $this;
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * @param FieldObject[] $fields
     */
    public function setFields(array $fields)
    {
        $this->fields = $fields;
    }

    public function getNamespace(): string
    {
        return $this->getNamespaceFromClassNameUtility($this->getClassName());
    }

    public function getPath()
    {
        return str_replace('\\', '/', $this->getClassName());
    }
}
