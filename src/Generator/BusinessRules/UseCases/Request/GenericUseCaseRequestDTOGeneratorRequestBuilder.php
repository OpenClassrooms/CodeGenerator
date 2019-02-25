<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GenericUseCaseRequestDTOGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GenericUseCaseRequestDTOGeneratorRequest;

    public function create(): GenericUseCaseRequestDTOGeneratorRequestBuilder;

    public function withDomainAndUseCaseName(
        string $domain,
        string $useCaseName
    ): GenericUseCaseRequestDTOGeneratorRequestBuilder;
}
