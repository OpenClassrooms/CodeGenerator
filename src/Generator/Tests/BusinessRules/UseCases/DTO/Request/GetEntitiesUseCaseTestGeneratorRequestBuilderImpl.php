<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GetEntitiesUseCaseTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GetEntitiesUseCaseTestGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntitiesUseCaseTestGeneratorRequestBuilderImpl implements GetEntitiesUseCaseTestGeneratorRequestBuilder
{
    /**
     * @var GetEntitiesUseCaseTestGeneratorRequestDTO
     */
    private $request;

    public function create(): GetEntitiesUseCaseTestGeneratorRequestBuilder
    {
        $this->request = new GetEntitiesUseCaseTestGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $defaultValue): GetEntitiesUseCaseTestGeneratorRequestBuilder
    {
        $this->request->defaultValue = $defaultValue;

        return $this;
    }

    public function build(): GetEntitiesUseCaseTestGeneratorRequest
    {
        return $this->request;
    }
}
