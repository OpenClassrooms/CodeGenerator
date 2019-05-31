<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities;

use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class FileObject
{
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
     * @var MethodObject[]
     */
    protected $methods = [];

    public function __construct(string $className)
    {
        $this->className = $className;
    }

    public function alreadyExists(): bool
    {
        return $this->alreadyExists;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getBaseNamespace(): string
    {
        return FileObjectUtility::getBaseNamespaceFromClassName($this->className);
    }

    public function getDomain(): string
    {
        return FileObjectUtility::getDomainFromClassName($this->className);
    }

    public function getEntity(): string
    {
        return FileObjectUtility::getEntityNameFromClassName($this->className);
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
    public function setFields(array $fields): void
    {
        $this->fields = $fields;
    }

    public function hasBeenWritten(): bool
    {
        return $this->hasBeenWritten;
    }

    public function write(): void
    {
        $this->hasBeenWritten = true;
    }

    public function getId(): string
    {
        return $this->className;
    }

    public function getNamespace(): string
    {
        return FileObjectUtility::getNamespace($this->getClassName());
    }

    public function getClassName(): string
    {
        return $this->className;
    }

    public function setClassName(string $className): void
    {
        $this->className = $className;
    }

    public function getPath(): string
    {
        $classname = str_replace('OpenClassrooms\CodeGenerator\\', '', $this->getClassName());
        if ($this->isTest()) {
            return str_replace('\\', '/', 'Tests/' . $classname . '.php');
        }
        if ($this->isTemplate()) {
            return str_replace('\\', '/', 'src/' . $classname);
        }

        return str_replace('\\', '/', 'src/' . $classname . '.php');
    }

    private function isTest(): bool
    {
        return (bool) preg_match('/Test$|TestCase$|Stub\d$|Mock$/', $this->getShortName());
    }

    public function getShortName(): string
    {
        return FileObjectUtility::getShortClassName($this->className);
    }

    private function isTemplate(): bool
    {
        if (false !== strpos($this->getShortName(), 'twig')) {
            return true;
        }

        return false;
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

    /**
     * @return MethodObject[]
     */
    public function getMethods(): array
    {
        return $this->methods;
    }

    /**
     * @return MethodObject[]
     */
    public function setMethods(array $methods): void
    {
        $this->methods = $methods;
    }
}
