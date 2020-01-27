<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GetEntityUseCaseRequestDTOGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetEntityUseCaseRequestDTOGeneratorRequest;

    public function create(): GetEntityUseCaseRequestDTOGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entity
    ): GetEntityUseCaseRequestDTOGeneratorRequestBuilder;
}
