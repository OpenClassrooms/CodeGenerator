<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntitiesUseCaseRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntitiesUseCaseRequestGeneratorRequestBuilder;

class GetEntitiesUseCaseRequestGeneratorRequestBuilderImpl implements GetEntitiesUseCaseRequestGeneratorRequestBuilder
{
    /**
     * @var GetEntitiesUseCaseRequestGeneratorRequestDTO
     */
    private $request;

    public function build(): GetEntitiesUseCaseRequestGeneratorRequest
    {
        return $this->request;
    }

    public function create(): GetEntitiesUseCaseRequestGeneratorRequestBuilder
    {
        $this->request = new GetEntitiesUseCaseRequestGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): GetEntitiesUseCaseRequestGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }
}
