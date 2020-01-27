<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GenericUseCaseRequestBuilderGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GenericUseCaseRequestBuilderGeneratorRequest;

    public function create(): GenericUseCaseRequestBuilderGeneratorRequestBuilder;

    public function withDomain(
        string $domain
    ): GenericUseCaseRequestBuilderGeneratorRequestBuilder;

    public function withUseCaseName(
        string $useCaseName
    ): GenericUseCaseRequestBuilderGeneratorRequestBuilder;
}
