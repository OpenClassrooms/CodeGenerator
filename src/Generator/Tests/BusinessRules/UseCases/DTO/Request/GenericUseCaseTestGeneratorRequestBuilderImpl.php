<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GenericUseCaseTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GenericUseCaseTestGeneratorRequestBuilder;

class GenericUseCaseTestGeneratorRequestBuilderImpl implements GenericUseCaseTestGeneratorRequestBuilder
{
    private GenericUseCaseTestGeneratorRequestDTO $request;

    public function build(): GenericUseCaseTestGeneratorRequest
    {
        return $this->request;
    }

    public function create(): GenericUseCaseTestGeneratorRequestBuilder
    {
        $this->request = new GenericUseCaseTestGeneratorRequestDTO();

        return $this;
    }

    public function withDomain(string $domain): GenericUseCaseTestGeneratorRequestBuilder
    {
        $this->request->domain = $domain;

        return $this;
    }

    public function withUseCaseName(string $useCaseName): GenericUseCaseTestGeneratorRequestBuilder
    {
        $this->request->useCaseName = $useCaseName;

        return $this;
    }
}
