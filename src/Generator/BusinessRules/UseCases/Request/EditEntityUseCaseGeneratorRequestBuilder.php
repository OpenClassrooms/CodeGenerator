<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface EditEntityUseCaseGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): EditEntityUseCaseGeneratorRequest;

    public function create(): EditEntityUseCaseGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): EditEntityUseCaseGeneratorRequestBuilder;
}
