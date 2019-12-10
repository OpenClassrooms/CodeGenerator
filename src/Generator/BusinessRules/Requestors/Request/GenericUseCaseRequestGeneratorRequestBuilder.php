<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GenericUseCaseRequestGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GenericUseCaseRequestGeneratorRequest;

    public function create(): GenericUseCaseRequestGeneratorRequestBuilder;

    public function withDomain(
        string $domain
    ): GenericUseCaseRequestGeneratorRequestBuilder;

    public function withUseCaseName(
        string $useCaseName
    ): GenericUseCaseRequestGeneratorRequestBuilder;
}
