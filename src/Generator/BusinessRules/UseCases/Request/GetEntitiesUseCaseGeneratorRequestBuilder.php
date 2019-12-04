<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GetEntitiesUseCaseGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetEntitiesUseCaseGeneratorRequest;

    public function create(): GetEntitiesUseCaseGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): GetEntitiesUseCaseGeneratorRequestBuilder;
}
