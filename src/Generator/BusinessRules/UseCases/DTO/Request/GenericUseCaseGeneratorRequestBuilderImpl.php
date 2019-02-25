<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseGeneratorRequestBuilderImpl implements GenericUseCaseGeneratorRequestBuilder
{
    /**
     * @var GenericUseCaseGeneratorRequestDTO
     */
    private $request;

    public function create(): GenericUseCaseGeneratorRequestBuilder
    {
        $this->request = new GenericUseCaseGeneratorRequestDTO();

        return $this;
    }

    public function withClassName(string $className): GenericUseCaseGeneratorRequestBuilder
    {
        $this->request->className = $className;

        return $this;
    }

    public function build(): GenericUseCaseGeneratorRequest
    {
        return $this->request;
    }
}
