<?php declare(strict_types=1);
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain;

/**
 * @author authorStub <author.stub@example.com>
 */
abstract class FunctionalEntity
{
    /**
     * @var string
     */
    public $field1;

    /**
     * @var string[]
     */
    public $field2;

    /**
     * @var bool
     */
    public $field3;

    /**
     * @var int
     */
    public $id;

    public function getField1(): string
    {
        return $this->field1;
    }

    public function getField2(): array
    {
        return $this->field2;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function isField3(): bool
    {
        return $this->field3;
    }
}
