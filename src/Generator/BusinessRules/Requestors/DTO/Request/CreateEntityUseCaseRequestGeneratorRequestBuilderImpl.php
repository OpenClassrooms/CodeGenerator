<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\CreateEntityUseCaseRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\CreateEntityUseCaseRequestGeneratorRequestBuilder;

class CreateEntityUseCaseRequestGeneratorRequestBuilderImpl implements CreateEntityUseCaseRequestGeneratorRequestBuilder
{
    /**
     * @var CreateEntityUseCaseRequestGeneratorRequestDTO
     */
    private $request;

    public function create(): CreateEntityUseCaseRequestGeneratorRequestBuilder
    {
        $this->request = new CreateEntityUseCaseRequestGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): CreateEntityUseCaseRequestGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): CreateEntityUseCaseRequestGeneratorRequest
    {
        return $this->request;
    }
}
