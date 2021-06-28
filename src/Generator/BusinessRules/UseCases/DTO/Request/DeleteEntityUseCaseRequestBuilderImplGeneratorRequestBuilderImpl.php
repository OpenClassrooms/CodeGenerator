<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\DeleteEntityUseCaseRequestBuilderImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\DeleteEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;

class DeleteEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl implements DeleteEntityUseCaseRequestBuilderImplGeneratorRequestBuilder
{
    private DeleteEntityUseCaseRequestBuilderImplGeneratorRequestDTO $request;

    public function build(): DeleteEntityUseCaseRequestBuilderImplGeneratorRequest
    {
        return $this->request;
    }

    public function create(): DeleteEntityUseCaseRequestBuilderImplGeneratorRequestBuilder
    {
        $this->request = new DeleteEntityUseCaseRequestBuilderImplGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(
        string $entityClassName
    ): DeleteEntityUseCaseRequestBuilderImplGeneratorRequestBuilder {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }
}
