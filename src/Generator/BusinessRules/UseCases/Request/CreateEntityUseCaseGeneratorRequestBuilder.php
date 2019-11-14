<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface CreateEntityUseCaseGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): CreateEntityUseCaseGeneratorRequest;

    public function create(): CreateEntityUseCaseGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): CreateEntityUseCaseGeneratorRequestBuilder;
}
