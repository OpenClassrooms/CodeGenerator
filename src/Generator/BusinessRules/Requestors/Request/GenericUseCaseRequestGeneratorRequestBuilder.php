<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GenericUseCaseRequestGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GenericUseCaseRequestGeneratorRequest;

    public function create(): GenericUseCaseRequestGeneratorRequestBuilder;

    public function withDomainAndUseCaseName(
        string $domain,
        string $useCaseName
    ): GenericUseCaseRequestGeneratorRequestBuilder;
}
