<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\CreateEntityRequestBuilderGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\CreateEntityRequestBuilderGeneratorRequestBuilder;

class CreateEntityRequestBuilderGeneratorRequestBuilderImpl implements CreateEntityRequestBuilderGeneratorRequestBuilder
{
    /**
     * @var CreateEntityRequestBuilderGeneratorRequestDTO
     */
    private $request;

    public function create(): CreateEntityRequestBuilderGeneratorRequestBuilder
    {
        $this->request = new CreateEntityRequestBuilderGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): CreateEntityRequestBuilderGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): CreateEntityRequestBuilderGeneratorRequest
    {
        return $this->request;
    }
}
