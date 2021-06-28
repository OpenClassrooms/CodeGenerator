<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\EditEntityUseCaseRequestBuilderGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\EditEntityUseCaseRequestBuilderGeneratorRequestBuilder;

class EditEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl implements EditEntityUseCaseRequestBuilderGeneratorRequestBuilder
{
    private EditEntityUseCaseRequestBuilderGeneratorRequestDTO $request;

    public function build(): EditEntityUseCaseRequestBuilderGeneratorRequest
    {
        return $this->request;
    }

    public function create(): EditEntityUseCaseRequestBuilderGeneratorRequestBuilder
    {
        $this->request = new EditEntityUseCaseRequestBuilderGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): EditEntityUseCaseRequestBuilderGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }
}
