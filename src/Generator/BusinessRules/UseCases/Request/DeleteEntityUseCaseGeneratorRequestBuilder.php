<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface DeleteEntityUseCaseGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): DeleteEntityUseCaseGeneratorRequest;

    public function create(): DeleteEntityUseCaseGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): DeleteEntityUseCaseGeneratorRequestBuilder;
}
