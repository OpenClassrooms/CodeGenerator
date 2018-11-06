<?php

namespace OpenClassrooms\CodeGenerator\ClassObjects;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class FieldObject
{
    const SCOPE_PRIVATE = 'private';

    const SCOPE_PUBLIC = 'public';

    /**
     * @var string
     */
    private $accessor;

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
    private $scope = FieldObject::SCOPE_PRIVATE;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAccessor()
    {
        return $this->accessor;
    }

    public function setAccessor(string $accessor = null)
    {
        $this->accessor = $accessor;
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

    public function getType(): string
    {
        return preg_replace('/(\W)|(var)/', '', $this->getDocComment());
    }

    public function getDocComment(): string
    {
        return $this->docComment;
    }

    public function setDocComment(string $docComment)
    {
        $this->docComment = $docComment;
    }
}
