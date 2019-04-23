<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class FunctionalEntity
{
    /**
     * @var string
     */
    protected $field1;

    /**
     * @var string[]
     */
    protected $field2;

    /**
     * @var bool
     */
    protected $field3;

    /**
     * @var \DateTimeImmutable
     */
    protected $field4;

    /**
     * @var int
     */
    protected $id;

    public function getField1(): string
    {
        return $this->field1;
    }

    /**
     * @return string[]
     */
    public function getField2(): array
    {
        return $this->field2;
    }

    public function isField3(): bool
    {
        return $this->field3;
    }

    public function getField4(): ?\DateTimeImmutable
    {
        return $this->field4;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
