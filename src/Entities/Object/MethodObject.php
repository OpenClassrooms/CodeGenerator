<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities\Object;

use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

class MethodObject
{
    /**
     * @var FieldObject[]
     */
    protected array $arguments = [];

    protected ?string $docComment = null;

    protected string $name = '';

    protected bool $nullable;

    protected string $returnType = '';

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

    public function getDocComment(): ?string
    {
        return $this->docComment;
    }

    public function setDocComment(?string $docComment): void
    {
        $this->docComment = $docComment;
    }

    public function getAccessorName(): string
    {
        return MethodUtility::createAccessorNameFromMethod($this->getName());
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
        return false !== strpos($this->returnType, 'Date');
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
