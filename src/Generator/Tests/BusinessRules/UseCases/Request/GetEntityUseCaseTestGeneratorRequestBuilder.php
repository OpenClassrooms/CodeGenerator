<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GetEntityUseCaseTestGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetEntityUseCaseTestGeneratorRequest;

    public function create(): GetEntityUseCaseTestGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entity
    ): GetEntityUseCaseTestGeneratorRequestBuilder;
}
