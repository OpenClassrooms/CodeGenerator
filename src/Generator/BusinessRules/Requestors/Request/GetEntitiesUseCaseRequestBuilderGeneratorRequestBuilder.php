<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GetEntitiesUseCaseRequestBuilderGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetEntitiesUseCaseRequestBuilderGeneratorRequest;

    public function create(): GetEntitiesUseCaseRequestBuilderGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): GetEntitiesUseCaseRequestBuilderGeneratorRequestBuilder;
}
