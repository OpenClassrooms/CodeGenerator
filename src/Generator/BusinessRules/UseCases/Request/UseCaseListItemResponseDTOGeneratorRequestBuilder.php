<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface UseCaseListItemResponseDTOGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): UseCaseListItemResponseDTOGeneratorRequest;

    public function create(): UseCaseListItemResponseDTOGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entity
    ): UseCaseListItemResponseDTOGeneratorRequestBuilder;

    /**
     * @param string[] $fields
     */
    public function withFields(
        array $fields
    ): UseCaseListItemResponseDTOGeneratorRequestBuilder;
}
