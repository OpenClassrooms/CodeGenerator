<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface EditEntityUseCaseRequestBuilderImplGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): EditEntityUseCaseRequestBuilderImplGeneratorRequest;

    public function create(): EditEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): EditEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;
}
