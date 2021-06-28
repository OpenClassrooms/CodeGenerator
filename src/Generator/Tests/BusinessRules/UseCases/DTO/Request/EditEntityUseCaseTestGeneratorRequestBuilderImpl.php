<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\EditEntityUseCaseTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\EditEntityUseCaseTestGeneratorRequestBuilder;

class EditEntityUseCaseTestGeneratorRequestBuilderImpl implements EditEntityUseCaseTestGeneratorRequestBuilder
{
    private EditEntityUseCaseTestGeneratorRequestDTO $request;

    public function build(): EditEntityUseCaseTestGeneratorRequest
    {
        return $this->request;
    }

    public function create(): EditEntityUseCaseTestGeneratorRequestBuilder
    {
        $this->request = new EditEntityUseCaseTestGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): EditEntityUseCaseTestGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }
}
