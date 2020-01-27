<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GetEntitiesUseCaseTestGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetEntitiesUseCaseTestGeneratorRequest;

    public function create(): GetEntitiesUseCaseTestGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): GetEntitiesUseCaseTestGeneratorRequestBuilder;
}
