<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityRequestBuilderImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityRequestBuilderImplGeneratorRequestBuilder;

class CreateEntityRequestBuilderImplGeneratorRequestBuilderImpl implements CreateEntityRequestBuilderImplGeneratorRequestBuilder
{
    /**
     * @var CreateEntityRequestBuilderImplGeneratorRequestDTO
     */
    private $request;

    public function create(): CreateEntityRequestBuilderImplGeneratorRequestBuilder
    {
        $this->request = new CreateEntityRequestBuilderImplGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): CreateEntityRequestBuilderImplGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): CreateEntityRequestBuilderImplGeneratorRequest
    {
        return $this->request;
    }
}
