<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityRequestDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityRequestDTOGeneratorRequestBuilder;

class CreateEntityRequestDTOGeneratorRequestBuilderImpl implements CreateEntityRequestDTOGeneratorRequestBuilder
{
    /**
     * @var CreateEntityRequestDTOGeneratorRequestDTO
     */
    private $request;

    public function create(): CreateEntityRequestDTOGeneratorRequestBuilder
    {
        $this->request = new CreateEntityRequestDTOGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): CreateEntityRequestDTOGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): CreateEntityRequestDTOGeneratorRequest
    {
        return $this->request;
    }
}
