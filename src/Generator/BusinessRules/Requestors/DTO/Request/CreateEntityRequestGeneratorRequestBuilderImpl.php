<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\CreateEntityRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\CreateEntityRequestGeneratorRequestBuilder;

class CreateEntityRequestGeneratorRequestBuilderImpl implements CreateEntityRequestGeneratorRequestBuilder
{
    /**
     * @var CreateEntityRequestGeneratorRequestDTO
     */
    private $request;

    public function create(): CreateEntityRequestGeneratorRequestBuilder
    {
        $this->request = new CreateEntityRequestGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): CreateEntityRequestGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function withFields(array $fields): CreateEntityRequestGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }

    public function build(): CreateEntityRequestGeneratorRequest
    {
        return $this->request;
    }
}
