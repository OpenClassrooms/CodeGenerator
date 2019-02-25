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

    public function withClassName(string $className): GenericUseCaseRequestDTOGeneratorRequestBuilder
    {
        $this->request->className = $className;

        return $this;
    }

    public function build(): GenericUseCaseRequestDTOGeneratorRequest
    {
        return $this->request;
    }
}
