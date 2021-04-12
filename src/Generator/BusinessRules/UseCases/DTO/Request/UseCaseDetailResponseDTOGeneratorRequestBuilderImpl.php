<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseDetailResponseDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseDetailResponseDTOGeneratorRequestBuilder;

class UseCaseDetailResponseDTOGeneratorRequestBuilderImpl implements UseCaseDetailResponseDTOGeneratorRequestBuilder
{
    private UseCaseDetailResponseDTOGeneratorRequestDTO $request;

    public function build(): UseCaseDetailResponseDTOGeneratorRequest
    {
        return $this->request;
    }

    public function create(): UseCaseDetailResponseDTOGeneratorRequestBuilder
    {
        $this->request = new UseCaseDetailResponseDTOGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entity): UseCaseDetailResponseDTOGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withFields(array $fields): UseCaseDetailResponseDTOGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }
}
