<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities\Object;

use OpenClassrooms\CodeGenerator\Utility\DocCommentUtility;
use OpenClassrooms\CodeGenerator\Utility\FieldObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\StringUtility;

class FieldObject
{
    public const SCOPE_PRIVATE = 'private';

    public const SCOPE_PROTECTED = 'protected';

    public const SCOPE_PUBLIC = 'public';

    protected ?string $accessor = null;

    protected ?string $accessorDocComment = null;

    protected ?string $docComment = null;

    protected string $name;

    protected string $scope = FieldObject::SCOPE_PRIVATE;

    protected ?string $type = null;

    /**
     * @var mixed
     */
    protected $value;

    public function __construct(string $name, ?string $type = null)
    {
        $this->name = $name;

        if ($type !== null) {
            $this->type = FieldObjectUtility::fixObjectType($type);
        }
    }

    public function getAccessor(): ?string
    {
        return $this->accessor;
    }

    public function setAccessor(?string $accessor)
    {
        $this->accessor = $accessor;
    }

    public function getAccessorDocComment(): ?string
    {
        return $this->accessorDocComment;
    }

    public function setAccessorDocComment(?string $accessorDocComment)
    {
        $this->accessorDocComment = $accessorDocComment;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getScope(): string
    {
        return $this->scope;
    }

    public function setScope(string $scope)
    {
        $this->scope = $scope;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value): void
    {
        $this->value = $value;
    }

    public function isObject(): bool
    {
        return StringUtility::isObject($this->getType());
    }

    public function getType(): ?string
    {
        if ($this->type === null) {
            $this->type = DocCommentUtility::getType($this->getDocComment()) ?? '';
        }

        return $this->type;
    }

    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    public function getDocComment(): ?string
    {
        return $this->docComment;
    }

    public function setDocComment(?string $docComment)
    {
        $this->docComment = $docComment;
    }

    public function isDateType(): bool
    {
        return false !== strpos($this->getType(), 'Date');
    }
}
