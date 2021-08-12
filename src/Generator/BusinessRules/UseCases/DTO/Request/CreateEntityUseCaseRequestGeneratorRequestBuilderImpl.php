<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityUseCaseRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityUseCaseRequestGeneratorRequestBuilder;

class CreateEntityUseCaseRequestGeneratorRequestBuilderImpl implements CreateEntityUseCaseRequestGeneratorRequestBuilder
{
    private CreateEntityUseCaseRequestGeneratorRequestDTO $request;

    public function create(): CreateEntityUseCaseRequestGeneratorRequestBuilder
    {
        $this->request = new CreateEntityUseCaseRequestGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): CreateEntityUseCaseRequestGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): CreateEntityUseCaseRequestGeneratorRequest
    {
        return $this->request;
    }
}
