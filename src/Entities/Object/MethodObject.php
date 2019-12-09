<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities\Object;

use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

class MethodObject
{
    /**
     * @var FieldObject[]
     */
    protected $arguments;

    /**
     * @var string
     */
    protected $docComment;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool
     */
    protected $nullable;

    /**
     * @var string
     */
    protected $returnType;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addArgument(FieldObject $argument): void
    {
        $this->arguments[] = $argument;
    }

    /**
     * @return FieldObject[]
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }

    /**
     * @return string|bool
     */
    public function getDocComment()
    {
        return $this->docComment;
    }

    /**
     * @param string|bool
     */
    public function setDocComment($docComment): void
    {
        $this->docComment = $docComment;
    }

    public function getFieldName(): string
    {
        return MethodUtility::createArgumentNameFromMethod($this->getName());
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getReturnType(): string
    {
        return $this->returnType;
    }

    public function setReturnType(string $returnType): void
    {
        $this->returnType = $returnType;
    }

    public function isDateType(): bool
    {
        return (bool) preg_match('/Date/', $this->returnType);
    }

    public function isNullable(): bool
    {
        return $this->nullable;
    }

    public function setNullable(bool $nullable): void
    {
        $this->nullable = $nullable;
    }
}
