<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GenericUseCaseRequestBuilderImplGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GenericUseCaseRequestBuilderImplGeneratorRequest;

    public function create(): GenericUseCaseRequestBuilderImplGeneratorRequestBuilder;

    public function withDomain(
        string $domain
    ): GenericUseCaseRequestBuilderImplGeneratorRequestBuilder;

    public function withUseCaseName(
        string $useCaseName
    ): GenericUseCaseRequestBuilderImplGeneratorRequestBuilder;
}
