<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntitiesUseCaseRequestBuilderImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilderImpl implements GetEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilder
{
    /**
     * @var GetEntitiesUseCaseRequestBuilderImplGeneratorRequestDTO
     */
    private $request;

    public function create(): GetEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilder
    {
        $this->request = new GetEntitiesUseCaseRequestBuilderImplGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(
        string $entityClassName
    ): GetEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilder {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): GetEntitiesUseCaseRequestBuilderImplGeneratorRequest
    {
        return $this->request;
    }
}
