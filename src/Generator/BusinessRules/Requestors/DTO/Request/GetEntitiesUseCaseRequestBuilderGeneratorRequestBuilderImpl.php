<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntitiesUseCaseRequestBuilderGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntitiesUseCaseRequestBuilderGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntitiesUseCaseRequestBuilderGeneratorRequestBuilderImpl implements GetEntitiesUseCaseRequestBuilderGeneratorRequestBuilder
{
    /**
     * @var GetEntitiesUseCaseRequestBuilderGeneratorRequestDTO
     */
    private $request;

    public function create(): GetEntitiesUseCaseRequestBuilderGeneratorRequestBuilder
    {
        $this->request = new GetEntitiesUseCaseRequestBuilderGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(
        string $entityClassName
    ): GetEntitiesUseCaseRequestBuilderGeneratorRequestBuilder {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): GetEntitiesUseCaseRequestBuilderGeneratorRequest
    {
        return $this->request;
    }
}
