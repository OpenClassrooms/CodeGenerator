<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GetEntityUseCaseRequestBuilderImplGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetEntityUseCaseRequestBuilderImplGeneratorRequest;

    public function create(): GetEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entity
    ): GetEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;
}
