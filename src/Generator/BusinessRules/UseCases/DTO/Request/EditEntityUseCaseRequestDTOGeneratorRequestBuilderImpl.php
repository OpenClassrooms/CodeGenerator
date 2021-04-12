<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EditEntityUseCaseRequestDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EditEntityUseCaseRequestDTOGeneratorRequestBuilder;

class EditEntityUseCaseRequestDTOGeneratorRequestBuilderImpl implements EditEntityUseCaseRequestDTOGeneratorRequestBuilder
{
    private EditEntityUseCaseRequestDTOGeneratorRequestDTO $request;

    public function build(): EditEntityUseCaseRequestDTOGeneratorRequest
    {
        return $this->request;
    }

    public function create(): EditEntityUseCaseRequestDTOGeneratorRequestBuilder
    {
        $this->request = new EditEntityUseCaseRequestDTOGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): EditEntityUseCaseRequestDTOGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }
}
