<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface DeleteEntityUseCaseRequestBuilderImplGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): DeleteEntityUseCaseRequestBuilderImplGeneratorRequest;

    public function create(): DeleteEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): DeleteEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;
}
