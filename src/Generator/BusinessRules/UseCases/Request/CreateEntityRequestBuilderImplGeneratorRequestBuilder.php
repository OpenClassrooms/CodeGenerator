<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface CreateEntityRequestBuilderImplGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): CreateEntityRequestBuilderImplGeneratorRequest;

    public function create(): CreateEntityRequestBuilderImplGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): CreateEntityRequestBuilderImplGeneratorRequestBuilder;
}
