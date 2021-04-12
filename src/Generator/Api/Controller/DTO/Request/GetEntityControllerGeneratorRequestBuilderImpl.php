<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Controller\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\GetEntityControllerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\GetEntityControllerGeneratorRequestBuilder;

class GetEntityControllerGeneratorRequestBuilderImpl implements GetEntityControllerGeneratorRequestBuilder
{
    private GetEntityControllerGeneratorRequestDTO $request;

    public function create(): GetEntityControllerGeneratorRequestBuilder
    {
        $this->request = new GetEntityControllerGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): GetEntityControllerGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): GetEntityControllerGeneratorRequest
    {
        return $this->request;
    }
}
