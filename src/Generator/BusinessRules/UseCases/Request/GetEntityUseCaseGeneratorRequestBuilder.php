<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GetEntityUseCaseGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetEntityUseCaseGeneratorRequest;

    public function create(): GetEntityUseCaseGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entity
    ): GetEntityUseCaseGeneratorRequestBuilder;
}
