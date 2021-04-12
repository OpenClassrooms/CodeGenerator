<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\DeleteEntityUseCaseRequestBuilderGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\DeleteEntityUseCaseRequestBuilderGeneratorRequestBuilder;

class DeleteEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl implements DeleteEntityUseCaseRequestBuilderGeneratorRequestBuilder
{
    private DeleteEntityUseCaseRequestBuilderGeneratorRequestDTO $request;

    public function build(): DeleteEntityUseCaseRequestBuilderGeneratorRequest
    {
        return $this->request;
    }

    public function create(): DeleteEntityUseCaseRequestBuilderGeneratorRequestBuilder
    {
        $this->request = new DeleteEntityUseCaseRequestBuilderGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(
        string $entityClassName
    ): DeleteEntityUseCaseRequestBuilderGeneratorRequestBuilder {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }
}
