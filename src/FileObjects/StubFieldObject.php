<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\FileObjects;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class StubFieldObject extends FieldObject
{
    /**
     * @var string
     */
    protected $const;

    /**
     * @var string
     */
    protected $scope = FieldObject::SCOPE_PUBLIC;

    public function getConst(): string
    {
        return $this->const;
    }

    public function setConst(string $const): void
    {
        $this->const = $const;
    }
}
