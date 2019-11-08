<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityGeneratorRequestBuilder;

class CreateEntityGeneratorRequestBuilderImpl implements CreateEntityGeneratorRequestBuilder
{
    /**
     * @var CreateEntityGeneratorRequestDTO
     */
    private $request;

    public function create(): CreateEntityGeneratorRequestBuilder
    {
        $this->request = new CreateEntityGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): CreateEntityGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): CreateEntityGeneratorRequest
    {
        return $this->request;
    }
}
