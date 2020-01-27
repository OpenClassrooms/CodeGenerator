<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface UseCaseDetailResponseDTOGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): UseCaseDetailResponseDTOGeneratorRequest;

    public function create(): UseCaseDetailResponseDTOGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entity
    ): UseCaseDetailResponseDTOGeneratorRequestBuilder;

    /**
     * @param string[] $fields
     */
    public function withFields(
        array $fields
    ): UseCaseDetailResponseDTOGeneratorRequestBuilder;
}
