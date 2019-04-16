<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class MethodObject
{
    /**
     * @var string
     */
    private $docComment;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $returnType;

    public function __construct(string $name)
    {
        $this->name = $name;
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

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getReturnType(): string
    {
        return $this->returnType;
    }

    public function setReturnType(string $returnType): void
    {
        $this->returnType = $returnType;
    }
}
