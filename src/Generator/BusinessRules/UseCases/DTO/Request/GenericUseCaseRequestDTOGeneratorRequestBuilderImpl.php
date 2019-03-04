<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseRequestDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseRequestDTOGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseRequestDTOGeneratorRequestBuilderImpl implements GenericUseCaseRequestDTOGeneratorRequestBuilder
{
    /**
     * @var GenericUseCaseRequestDTOGeneratorRequestDTO
     */
    private $request;

    public function create(): GenericUseCaseRequestDTOGeneratorRequestBuilder
    {
        $this->request = new GenericUseCaseRequestDTOGeneratorRequestDTO();

        return $this;
    }

    public function withDomain(string $domain): GenericUseCaseRequestDTOGeneratorRequestBuilder
    {
        $this->request->domain = $domain;

        return $this;
    }

    public function withUseCaseName(string $useCaseName): GenericUseCaseRequestDTOGeneratorRequestBuilder
    {
        $this->request->useCaseName = $useCaseName;

        return $this;
    }

    public function build(): GenericUseCaseRequestDTOGeneratorRequest
    {
        return $this->request;
    }
}
