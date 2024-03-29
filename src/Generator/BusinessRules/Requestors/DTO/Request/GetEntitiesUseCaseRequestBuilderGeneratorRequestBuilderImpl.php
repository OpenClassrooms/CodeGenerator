<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntitiesUseCaseRequestBuilderGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntitiesUseCaseRequestBuilderGeneratorRequestBuilder;

class GetEntitiesUseCaseRequestBuilderGeneratorRequestBuilderImpl implements GetEntitiesUseCaseRequestBuilderGeneratorRequestBuilder
{
    private GetEntitiesUseCaseRequestBuilderGeneratorRequestDTO $request;

    public function build(): GetEntitiesUseCaseRequestBuilderGeneratorRequest
    {
        return $this->request;
    }

    public function create(): GetEntitiesUseCaseRequestBuilderGeneratorRequestBuilder
    {
        $this->request = new GetEntitiesUseCaseRequestBuilderGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(
        string $entityClassName
    ): GetEntitiesUseCaseRequestBuilderGeneratorRequestBuilder {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }
}
