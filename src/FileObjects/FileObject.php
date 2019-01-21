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
     * @var ConstObject[]
     */
    protected $consts = [];

    /**
     * @var string
     */
    protected $content;

    /**
     * @var FieldObject[]
     */
    protected $fields = [];

    /**
     * @var bool
     */
    protected $hasBeenWritten = false;

    /**
     * @var array
     */
    protected $methods = [];

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

    public function getDomain()
    {
        return $this->getDomainFromClassName($this->className);
    }

    public function getEntity()
    {
        return $this->getEntityNameFromClassName($this->className);
    }

    /**
     * @return FieldObject[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * @param FieldObject[]
     */
    public function setFields(array $fields)
    {
        $this->fields = $fields;
    }

    public function hasBeenWritten(): bool
    {
        return $this->hasBeenWritten;
    }

    public function write()
    {
        $this->hasBeenWritten = true;
    }

    public function getId(): string
    {
        return $this->className;
    }

    public function getNamespace(): string
    {
        return $this->getNamespaceFromClassNameUtility($this->getClassName());
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
        if ($this->isTest()) {
            return str_replace('\\', '/', 'tests/' . $this->getClassName() . '.php');
        }

        return str_replace('\\', '/', 'src/' . $this->getClassName() . '.php');
    }

    public function isTest(): bool
    {
        if (false !== strpos('Test', $this->getShortName())) {
            return true;
        }
            return false;

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

    /**
     * @return ConstObject[]
     */
    public function getConsts(): array
    {
        return $this->consts;
    }

    /**
     * @param ConstObject[]
     */
    public function setConsts(array $consts): void
    {
        $this->consts = $consts;
    }

    public function getMethods(): array
    {
        return $this->methods;
    }

    public function setMethods(array $methods): void
    {
        $this->methods = $methods;
    }
}
