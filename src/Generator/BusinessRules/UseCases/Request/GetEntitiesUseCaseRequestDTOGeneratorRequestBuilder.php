<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GetEntitiesUseCaseRequestDTOGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetEntitiesUseCaseRequestDTOGeneratorRequest;

    public function create(): GetEntitiesUseCaseRequestDTOGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): GetEntitiesUseCaseRequestDTOGeneratorRequestBuilder;
}
