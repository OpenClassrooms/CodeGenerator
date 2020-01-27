<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseGeneratorRequestBuilder;

class GenericUseCaseGeneratorRequestBuilderImpl implements GenericUseCaseGeneratorRequestBuilder
{
    /**
     * @var GenericUseCaseGeneratorRequestDTO
     */
    private $request;

    public function build(): GenericUseCaseGeneratorRequest
    {
        return $this->request;
    }

    public function create(): GenericUseCaseGeneratorRequestBuilder
    {
        $this->request = new GenericUseCaseGeneratorRequestDTO();

        return $this;
    }

    public function withDomain(string $domain): GenericUseCaseGeneratorRequestBuilder
    {
        $this->request->domain = $domain;

        return $this;
    }

    public function withUseCaseName(string $useCaseName): GenericUseCaseGeneratorRequestBuilder
    {
        $this->request->useCaseName = $useCaseName;

        return $this;
    }
}
