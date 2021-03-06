<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GenericUseCaseTestGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GenericUseCaseTestGeneratorRequest;

    public function create(): GenericUseCaseTestGeneratorRequestBuilder;

    public function withDomain(
        string $domain
    ): GenericUseCaseTestGeneratorRequestBuilder;

    public function withUseCaseName(
        string $useCaseName
    ): GenericUseCaseTestGeneratorRequestBuilder;
}
