<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request\EntityNotFoundExceptionGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request\EntityNotFoundExceptionGeneratorRequestBuilder;

class EntityNotFoundExceptionGeneratorRequestBuilderImpl implements EntityNotFoundExceptionGeneratorRequestBuilder
{
    private EntityNotFoundExceptionGeneratorRequestDTO $request;

    public function build(): EntityNotFoundExceptionGeneratorRequest
    {
        return $this->request;
    }

    public function create(): EntityNotFoundExceptionGeneratorRequestBuilder
    {
        $this->request = new EntityNotFoundExceptionGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entity): EntityNotFoundExceptionGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }
}
