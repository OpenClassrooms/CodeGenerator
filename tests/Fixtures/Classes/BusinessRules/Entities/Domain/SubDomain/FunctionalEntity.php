<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain;

use Carbon\CarbonImmutable;

abstract class FunctionalEntity
{
    protected string $field1;

    /**
     * @var string[]
     */
    protected array $field2;

    protected bool $field3;

    protected \DateTimeInterface $field4;

    protected int $id;

    protected \DateTimeInterface $updatedAt;

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

    public function getField4(): \DateTimeInterface
    {
        return $this->field4;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function isField3(): bool
    {
        return $this->field3;
    }

    public function setField1(string $field1): void
    {
        $this->field1 = $field1;
    }

    public function setField2(array $field2): void
    {
        $this->field2 = $field2;
    }

    public function setField3(bool $field3): void
    {
        $this->field3 = $field3;
    }

    public function setField4(\DateTimeInterface $field4): void
    {
        $this->field4 = $field4;
    }

    public function update(): void
    {
        $this->updatedAt = new CarbonImmutable();
    }
}
