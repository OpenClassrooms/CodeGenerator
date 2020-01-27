<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\CreateEntityUseCaseTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\CreateEntityUseCaseTestGeneratorRequestBuilder;

class CreateEntityUseCaseTestGeneratorRequestBuilderImpl implements CreateEntityUseCaseTestGeneratorRequestBuilder
{
    /**
     * @var CreateEntityUseCaseTestGeneratorRequestDTO
     */
    private $request;

    public function create(): CreateEntityUseCaseTestGeneratorRequestBuilder
    {
        $this->request = new CreateEntityUseCaseTestGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): CreateEntityUseCaseTestGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): CreateEntityUseCaseTestGeneratorRequest
    {
        return $this->request;
    }
}
