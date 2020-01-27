<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GetEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetEntitiesUseCaseRequestBuilderImplGeneratorRequest;

    public function create(): GetEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): GetEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilder;
}
