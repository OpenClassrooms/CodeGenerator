<?php

namespace OpenClassrooms\CodeGenerator\FileObjects;

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

    public function setAlreadyExists(bool $alreadyExists)
    {
        $this->alreadyExists = $alreadyExists;
    }

    public function alreadyExists(): bool
    {
        return $this->alreadyExists;
    }

    public function setClassName($className)
    {
        $this->className = $className;
    }

    public function getClassName(): string
    {
        return $this->className;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content)
    {
        $this->content = $content;
    }

    public function getId(): string
    {
        return $this->className;
    }
}
