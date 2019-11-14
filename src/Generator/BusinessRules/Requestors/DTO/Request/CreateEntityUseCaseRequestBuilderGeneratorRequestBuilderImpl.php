<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\CreateEntityUseCaseRequestBuilderGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\CreateEntityUseCaseRequestBuilderGeneratorRequestBuilder;

class CreateEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl implements CreateEntityUseCaseRequestBuilderGeneratorRequestBuilder
{
    /**
     * @var CreateEntityUseCaseRequestBuilderGeneratorRequestDTO
     */
    private $request;

    public function create(): CreateEntityUseCaseRequestBuilderGeneratorRequestBuilder
    {
        $this->request = new CreateEntityUseCaseRequestBuilderGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): CreateEntityUseCaseRequestBuilderGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): CreateEntityUseCaseRequestBuilderGeneratorRequest
    {
        return $this->request;
    }
}
