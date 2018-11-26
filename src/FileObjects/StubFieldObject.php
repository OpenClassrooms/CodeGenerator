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

    protected $initialisation;

    protected $objectNamespace;

    public function getConst(): string
    {
        return $this->const;
    }

    public function setConst(string $const): void
    {
        $this->const = $const;
    }

    public function getInitialisation(): ?string
    {
        return $this->initialisation;
    }

    public function setInitialisation($initialisation): void
    {
        $this->initialisation = $initialisation;
    }

    public function getObjectNamespace(): ?string
    {
        return $this->objectNamespace;
    }

    public function setObjectNamespace($objectNamespace): void
    {
        $this->objectNamespace = $objectNamespace;
    }
}
