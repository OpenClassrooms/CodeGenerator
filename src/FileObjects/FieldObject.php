<?php declare(strict_types=1);

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
    protected $accessor;

    /**
     * @var string
     */
    protected $docComment;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $scope = FieldObject::SCOPE_PRIVATE;

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

    public function getType(): string
    {
        if (strpos($this->getDocComment(), '[]') !== false) {
            return 'array';
        }

        return preg_replace('/(\W)|(var)/', '', $this->getDocComment());
    }

    public function setAccessor(string $accessor = null)
    {
        $this->accessor = $accessor;
    }

    public function setDocComment(string $docComment)
    {
        $this->docComment = $docComment;
    }

    public function setScope(string $scope)
    {
        $this->scope = $scope;
    }
}
