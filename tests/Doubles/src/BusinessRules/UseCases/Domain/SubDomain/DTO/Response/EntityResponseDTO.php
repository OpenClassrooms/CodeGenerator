<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response;

use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain\EntityDetailResponse;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
abstract class EntityResponseDTO implements EntityDetailResponse
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
}
