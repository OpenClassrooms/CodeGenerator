<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseGeneratorRequest;

class GetEntityUseCaseGeneratorRequestDTO implements GetEntityUseCaseGeneratorRequest
{
    public string $entity;

    public function getEntityClassName(): string
    {
        return $this->entity;
    }
}
