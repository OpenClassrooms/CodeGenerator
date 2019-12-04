<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GenericUseCaseRequestDTOGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GenericUseCaseRequestDTOGeneratorRequest;

    public function create(): GenericUseCaseRequestDTOGeneratorRequestBuilder;

    public function withDomain(
        string $domain
    ): GenericUseCaseRequestDTOGeneratorRequestBuilder;

    public function withUseCaseName(
        string $useCaseName
    ): GenericUseCaseRequestDTOGeneratorRequestBuilder;
}
