<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateRequestTraitGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateRequestTraitGeneratorRequestBuilder;

class CreateRequestTraitGeneratorRequestBuilderImpl implements CreateRequestTraitGeneratorRequestBuilder
{
    private CreateRequestTraitGeneratorRequestDTO $request;

    public function create(): CreateRequestTraitGeneratorRequestBuilder
    {
        $this->request = new CreateRequestTraitGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): CreateRequestTraitGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): CreateRequestTraitGeneratorRequest
    {
        return $this->request;
    }
}
