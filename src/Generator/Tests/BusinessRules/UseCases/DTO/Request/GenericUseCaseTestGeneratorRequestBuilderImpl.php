<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GenericUseCaseTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GenericUseCaseTestGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseTestGeneratorRequestBuilderImpl implements GenericUseCaseTestGeneratorRequestBuilder
{
    /**
     * @var GenericUseCaseTestGeneratorRequestDTO
     */
    private $request;

    public function create(): GenericUseCaseTestGeneratorRequestBuilder
    {
        $this->request = new GenericUseCaseTestGeneratorRequestDTO();

        return $this;
    }

    public function withDomainAndUseCaseName(
        string $domain,
        string $useCaseName
    ): GenericUseCaseTestGeneratorRequestBuilder
    {
        $this->request->domain = $domain;
        $this->request->useCaseName = $useCaseName;

        return $this;
    }

    public function build(): GenericUseCaseTestGeneratorRequest
    {
        return $this->request;
    }
}
