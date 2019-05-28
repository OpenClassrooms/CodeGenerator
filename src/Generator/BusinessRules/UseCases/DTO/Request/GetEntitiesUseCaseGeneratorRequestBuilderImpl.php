<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntitiesUseCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntitiesUseCaseGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntitiesUseCaseGeneratorRequestBuilderImpl implements GetEntitiesUseCaseGeneratorRequestBuilder
{
    /**
     * @var GetEntitiesUseCaseGeneratorRequestDTO
     */
    private $request;

    public function create(): GetEntitiesUseCaseGeneratorRequestBuilder
    {
        $this->request = new GetEntitiesUseCaseGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $defaultValue): GetEntitiesUseCaseGeneratorRequestBuilder
    {
        $this->request->defaultValue = $defaultValue;

        return $this;
    }

    public function build(): GetEntitiesUseCaseGeneratorRequest
    {
        return $this->request;
    }
}
