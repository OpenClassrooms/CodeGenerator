<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface CreateEntityUseCaseRequestBuilderImplGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): CreateEntityUseCaseRequestBuilderImplGeneratorRequest;

    public function create(): CreateEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): CreateEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;
}
