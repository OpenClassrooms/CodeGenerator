<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface CreateEntityUseCaseTestGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): CreateEntityUseCaseTestGeneratorRequest;

    public function create(): CreateEntityUseCaseTestGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): CreateEntityUseCaseTestGeneratorRequestBuilder;
}
