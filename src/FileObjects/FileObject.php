<?php

namespace OpenClassrooms\CodeGenerator\FileObjects;

use OpenClassrooms\CodeGenerator\Utility\ClassNameUtility;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class FileObject
{
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
     * @var string
     */
    private $path;

    /**
     * @var $array
     */
    private $fields = [];

    use ClassNameUtility;

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

    public function getPath(): string
    {
        return str_replace('\\', '/', $this->path);
    }

    public function setPath(string $path)
    {
        $this->path = $path;

        return $this;
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    public function setFields($fields)
    {
        $this->fields = array_merge($this->fields, $fields);
    }
}
