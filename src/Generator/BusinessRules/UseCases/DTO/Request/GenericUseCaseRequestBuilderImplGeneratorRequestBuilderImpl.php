<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseRequestBuilderImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseRequestBuilderImplGeneratorRequestBuilder;

class GenericUseCaseRequestBuilderImplGeneratorRequestBuilderImpl implements GenericUseCaseRequestBuilderImplGeneratorRequestBuilder
{
    /**
     * @var GenericUseCaseRequestBuilderImplGeneratorRequestDTO
     */
    private $request;

    public function build(): GenericUseCaseRequestBuilderImplGeneratorRequest
    {
        return $this->request;
    }

    public function create(): GenericUseCaseRequestBuilderImplGeneratorRequestBuilder
    {
        $this->request = new GenericUseCaseRequestBuilderImplGeneratorRequestDTO();

        return $this;
    }

    public function withDomain(string $domain): GenericUseCaseRequestBuilderImplGeneratorRequestBuilder
    {
        $this->request->domain = $domain;

        return $this;
    }

    public function withUseCaseName(string $useCaseName): GenericUseCaseRequestBuilderImplGeneratorRequestBuilder
    {
        $this->request->useCaseName = $useCaseName;

        return $this;
    }
}
