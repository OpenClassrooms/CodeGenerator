<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\EditEntityUseCaseRequestBuilderGeneratorRequest;

class EditEntityUseCaseRequestBuilderGeneratorRequestDTO implements EditEntityUseCaseRequestBuilderGeneratorRequest
{
    public string $entityClassName;

    public function getEntityClassName(): string
    {
        return $this->entityClassName;
    }
}
