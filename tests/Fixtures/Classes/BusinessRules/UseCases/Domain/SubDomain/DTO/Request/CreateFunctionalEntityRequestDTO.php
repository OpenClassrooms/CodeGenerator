<?php declare(strict_types=1);
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Request;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\CreateFunctionalEntityRequest;

final class CreateFunctionalEntityRequestDTO implements CreateFunctionalEntityRequest
{
    /**
     * @var string
     */
    public $field1;

    /**
     * @var array
     */
    public $field2;

    /**
     * @var bool
     */
    public $field3;

    /**
     * @var \DateTimeImmutable
     */
    public $field4;

    public function getField1(): string
    {
        return $this->field1;
    }

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
}