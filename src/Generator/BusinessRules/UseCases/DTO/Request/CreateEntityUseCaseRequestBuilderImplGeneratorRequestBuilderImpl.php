<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityUseCaseRequestBuilderImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;

class CreateEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl implements CreateEntityUseCaseRequestBuilderImplGeneratorRequestBuilder
{
    /**
     * @var CreateEntityUseCaseRequestBuilderImplGeneratorRequestDTO
     */
    private $request;

    public function create(): CreateEntityUseCaseRequestBuilderImplGeneratorRequestBuilder
    {
        $this->request = new CreateEntityUseCaseRequestBuilderImplGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): CreateEntityUseCaseRequestBuilderImplGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): CreateEntityUseCaseRequestBuilderImplGeneratorRequest
    {
        return $this->request;
    }
}
