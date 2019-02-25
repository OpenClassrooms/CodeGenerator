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

    public function withClassName(string $className): GenericUseCaseRequestGeneratorRequestBuilder
    {
        $this->request->className = $className;

        return $this;
    }

    public function build(): GenericUseCaseRequestGeneratorRequest
    {
        return $this->request;
    }
}
