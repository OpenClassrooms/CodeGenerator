<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\DeleteEntityUseCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\DeleteEntityUseCaseGeneratorRequestBuilder;

class DeleteEntityUseCaseGeneratorRequestBuilderImpl implements DeleteEntityUseCaseGeneratorRequestBuilder
{
    private DeleteEntityUseCaseGeneratorRequestDTO $request;

    public function create(): DeleteEntityUseCaseGeneratorRequestBuilder
    {
        $this->request = new DeleteEntityUseCaseGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): DeleteEntityUseCaseGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): DeleteEntityUseCaseGeneratorRequest
    {
        return $this->request;
    }
}
