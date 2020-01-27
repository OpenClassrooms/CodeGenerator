<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GenericUseCaseRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GenericUseCaseRequestGeneratorRequestBuilder;

class GenericUseCaseRequestGeneratorRequestBuilderImpl implements GenericUseCaseRequestGeneratorRequestBuilder
{
    /**
     * @var GenericUseCaseRequestGeneratorRequestDTO
     */
    private $request;

    public function build(): GenericUseCaseRequestGeneratorRequest
    {
        return $this->request;
    }

    public function create(): GenericUseCaseRequestGeneratorRequestBuilder
    {
        $this->request = new GenericUseCaseRequestGeneratorRequestDTO();

        return $this;
    }

    public function withDomain(string $domain): GenericUseCaseRequestGeneratorRequestBuilder
    {
        $this->request->domain = $domain;

        return $this;
    }

    public function withUseCaseName(string $useCaseName): GenericUseCaseRequestGeneratorRequestBuilder
    {
        $this->request->useCaseName = $useCaseName;

        return $this;
    }
}
