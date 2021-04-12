<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GetEntityUseCaseTestGeneratorRequest;

class GetEntityUseCaseTestGeneratorRequestDTO implements GetEntityUseCaseTestGeneratorRequest
{
    public string $entity;

    public function getEntityClassName(): string
    {
        return $this->entity;
    }
}
