<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GenericUseCaseRequestBuilderGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GenericUseCaseRequestBuilderGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseRequestBuilderGeneratorRequestBuilderImpl implements GenericUseCaseRequestBuilderGeneratorRequestBuilder
{
    /**
     * @var GenericUseCaseRequestBuilderGeneratorRequestDTO
     */
    private $request;

    public function create(): GenericUseCaseRequestBuilderGeneratorRequestBuilder
    {
        $this->request = new GenericUseCaseRequestBuilderGeneratorRequestDTO();

        return $this;
    }

    public function withDomainAndUseCaseName(
        string $domain,
        string $useCaseName
    ): GenericUseCaseRequestBuilderGeneratorRequestBuilder
    {
        $this->request->domain = $domain;
        $this->request->useCaseName = $useCaseName;

        return $this;
    }

    public function build(): GenericUseCaseRequestBuilderGeneratorRequest
    {
        return $this->request;
    }
}
