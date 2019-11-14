<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityUseCaseRequestDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityUseCaseRequestDTOGeneratorRequestBuilder;

class CreateEntityUseCaseRequestDTOGeneratorRequestBuilderImpl implements CreateEntityUseCaseRequestDTOGeneratorRequestBuilder
{
    /**
     * @var CreateEntityUseCaseRequestDTOGeneratorRequestDTO
     */
    private $request;

    public function create(): CreateEntityUseCaseRequestDTOGeneratorRequestBuilder
    {
        $this->request = new CreateEntityUseCaseRequestDTOGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): CreateEntityUseCaseRequestDTOGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): CreateEntityUseCaseRequestDTOGeneratorRequest
    {
        return $this->request;
    }
}
