<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityUseCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityUseCaseGeneratorRequestBuilder;

class CreateEntityUseCaseGeneratorRequestBuilderImpl implements CreateEntityUseCaseGeneratorRequestBuilder
{
    /**
     * @var CreateEntityUseCaseGeneratorRequestDTO
     */
    private $request;

    public function create(): CreateEntityUseCaseGeneratorRequestBuilder
    {
        $this->request = new CreateEntityUseCaseGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): CreateEntityUseCaseGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): CreateEntityUseCaseGeneratorRequest
    {
        return $this->request;
    }
}
