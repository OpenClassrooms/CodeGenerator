<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request\EntityNotFoundExceptionGeneratorRequest;

class EntityNotFoundExceptionGeneratorRequestDTO implements EntityNotFoundExceptionGeneratorRequest
{
    public string $entity;

    public function getEnity(): string
    {
        return $this->entity;
    }
}
