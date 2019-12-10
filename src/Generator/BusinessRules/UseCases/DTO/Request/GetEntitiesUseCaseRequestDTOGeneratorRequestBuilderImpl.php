<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntitiesUseCaseRequestDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntitiesUseCaseRequestDTOGeneratorRequestBuilder;

class GetEntitiesUseCaseRequestDTOGeneratorRequestBuilderImpl implements GetEntitiesUseCaseRequestDTOGeneratorRequestBuilder
{
    /**
     * @var GetEntitiesUseCaseRequestDTOGeneratorRequestDTO
     */
    private $request;

    public function build(): GetEntitiesUseCaseRequestDTOGeneratorRequest
    {
        return $this->request;
    }

    public function create(): GetEntitiesUseCaseRequestDTOGeneratorRequestBuilder
    {
        $this->request = new GetEntitiesUseCaseRequestDTOGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): GetEntitiesUseCaseRequestDTOGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }
}
