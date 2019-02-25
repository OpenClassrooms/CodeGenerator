<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GenericUseCaseRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GenericUseCaseRequestGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseRequestGeneratorRequestBuilderImpl implements GenericUseCaseRequestGeneratorRequestBuilder
{
    /**
     * @var GenericUseCaseRequestGeneratorRequestDTO
     */
    private $request;

    public function create(): GenericUseCaseRequestGeneratorRequestBuilder
    {
        $this->request = new GenericUseCaseRequestGeneratorRequestDTO();

        return $this;
    }

    public function withDomainAndUseCaseName(
        string $domain,
        string $useCaseName
    ): GenericUseCaseRequestGeneratorRequestBuilder
    {
        $this->request->domain = $domain;
        $this->request->useCaseName = $useCaseName;

        return $this;
    }

    public function build(): GenericUseCaseRequestGeneratorRequest
    {
        return $this->request;
    }
}
