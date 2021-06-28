<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntityUseCaseRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntityUseCaseRequestGeneratorRequestBuilder;

class GetEntityUseCaseRequestGeneratorRequestBuilderImpl implements GetEntityUseCaseRequestGeneratorRequestBuilder
{
    private GetEntityUseCaseRequestGeneratorRequestDTO $request;

    public function build(): GetEntityUseCaseRequestGeneratorRequest
    {
        return $this->request;
    }

    public function create(): GetEntityUseCaseRequestGeneratorRequestBuilder
    {
        $this->request = new GetEntityUseCaseRequestGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entity): GetEntityUseCaseRequestGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }
}
