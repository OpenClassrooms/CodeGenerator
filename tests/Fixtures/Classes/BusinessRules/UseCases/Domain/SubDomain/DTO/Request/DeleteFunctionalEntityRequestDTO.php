<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Request;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\DeleteFunctionalEntityRequest;

final class DeleteFunctionalEntityRequestDTO implements DeleteFunctionalEntityRequest
{
    /**
     * @var int
     */
    public $functionalEntityId;

    public function __construct(int $id)
    {
        $this->functionalEntityId = $id;
    }

    public function getFunctionalEntityId(): int
    {
        return $this->functionalEntityId;
    }
}
