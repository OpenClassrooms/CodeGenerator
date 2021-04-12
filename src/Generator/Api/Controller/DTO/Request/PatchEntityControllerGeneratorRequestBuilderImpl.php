<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Controller\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\PatchEntityControllerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\PatchEntityControllerGeneratorRequestBuilder;

class PatchEntityControllerGeneratorRequestBuilderImpl implements PatchEntityControllerGeneratorRequestBuilder
{
    private PatchEntityControllerGeneratorRequestDTO $request;

    public function create(): PatchEntityControllerGeneratorRequestBuilder
    {
        $this->request = new PatchEntityControllerGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): PatchEntityControllerGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): PatchEntityControllerGeneratorRequest
    {
        return $this->request;
    }
}
