<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\DeleteEntityUseCaseRequestBuilderImplGeneratorRequest;

class DeleteEntityUseCaseRequestBuilderImplGeneratorRequestDTO implements DeleteEntityUseCaseRequestBuilderImplGeneratorRequest
{
    public string $entityClassName;

    public function getEntityClassName(): string
    {
        return $this->entityClassName;
    }
}
