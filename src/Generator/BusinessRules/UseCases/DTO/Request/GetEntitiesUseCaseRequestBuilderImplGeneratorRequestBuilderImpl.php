<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntitiesUseCaseRequestBuilderImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilder;

class GetEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilderImpl implements GetEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilder
{
    private GetEntitiesUseCaseRequestBuilderImplGeneratorRequestDTO $request;

    public function build(): GetEntitiesUseCaseRequestBuilderImplGeneratorRequest
    {
        return $this->request;
    }

    public function create(): GetEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilder
    {
        $this->request = new GetEntitiesUseCaseRequestBuilderImplGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(
        string $entityClassName
    ): GetEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilder {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }
}
