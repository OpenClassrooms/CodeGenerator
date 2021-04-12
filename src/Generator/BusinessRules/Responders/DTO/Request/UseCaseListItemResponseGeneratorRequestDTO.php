<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseListItemResponseGeneratorRequest;

class UseCaseListItemResponseGeneratorRequestDTO implements UseCaseListItemResponseGeneratorRequest
{
    public string $entity;

    public function getEntityClassName(): string
    {
        return $this->entity;
    }
}
