<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\FileObjects;

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
    protected $alreadyExists = false;

    /**
     * @var string
     */
    protected $className;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var FieldObject[]
     */
    protected $fields = [];

    public function alreadyExists(): bool
    {
        return $this->alreadyExists;
    }

    public function getClassName(): string
    {
        return $this->className;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getDomain()
    {
        return $this->getDomainFromClassName($this->className);
    }

    public function getEntity()
    {
        return $this->getEntityNameFromClassName($this->className);
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    public function getId(): string
    {
        return $this->className;
    }

    public function getNamespace(): string
    {
        return $this->getNamespaceFromClassNameUtility($this->getClassName());
    }

    public function getPath(): string
    {
        return str_replace('\\', '/', $this->getClassName() . '.php');
    }

    public function getShortName(): string
    {
        return $this->getShortClassNameFromClassName($this->className);
    }

    public function setAlreadyExists(bool $alreadyExists)
    {
        $this->alreadyExists = $alreadyExists;

        return $this;
    }

    public function setClassName(string $className)
    {
        $this->className = $className;

        return $this;
    }

    public function setContent(string $content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @param FieldObject[] $fields
     */
    public function setFields(array $fields)
    {
        $this->fields = $fields;
    }
}
