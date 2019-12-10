<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntitiesUseCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntitiesUseCaseGeneratorRequestBuilder;

class GetEntitiesUseCaseGeneratorRequestBuilderImpl implements GetEntitiesUseCaseGeneratorRequestBuilder
{
    /**
     * @var GetEntitiesUseCaseGeneratorRequestDTO
     */
    private $request;

    public function build(): GetEntitiesUseCaseGeneratorRequest
    {
        return $this->request;
    }

    public function create(): GetEntitiesUseCaseGeneratorRequestBuilder
    {
        $this->request = new GetEntitiesUseCaseGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): GetEntitiesUseCaseGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }
}
