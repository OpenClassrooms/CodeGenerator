<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GetEntitiesUseCaseTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GetEntitiesUseCaseTestGeneratorRequestBuilder;

class GetEntitiesUseCaseTestGeneratorRequestBuilderImpl implements GetEntitiesUseCaseTestGeneratorRequestBuilder
{
    /**
     * @var GetEntitiesUseCaseTestGeneratorRequestDTO
     */
    private $request;

    public function build(): GetEntitiesUseCaseTestGeneratorRequest
    {
        return $this->request;
    }

    public function create(): GetEntitiesUseCaseTestGeneratorRequestBuilder
    {
        $this->request = new GetEntitiesUseCaseTestGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): GetEntitiesUseCaseTestGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }
}
