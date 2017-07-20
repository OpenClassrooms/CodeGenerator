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
    private $docComment;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $scope;

    public function __construct($name, $docComment = null, $scope = FieldObject::SCOPE_PRIVATE)
    {
        $this->docComment = $docComment;
        $this->name = $name;
        $this->scope = $scope;
    }

    public function getDocComment(): string
    {
        return $this->docComment;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getScope(): string
    {
        return $this->scope;
    }
}
