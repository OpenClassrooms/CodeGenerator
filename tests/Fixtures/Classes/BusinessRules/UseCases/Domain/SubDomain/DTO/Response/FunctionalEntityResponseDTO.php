<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
abstract class FunctionalEntityResponseDTO implements FunctionalEntityResponse
{
    /**
     * @var int
     */
    public $id;

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

    public function getId(): int
    {
        return $this->id;
    }

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
}
