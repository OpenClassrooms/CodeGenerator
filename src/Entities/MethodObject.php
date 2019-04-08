<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class MethodObject
{
    /**
     * @var string
     */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
