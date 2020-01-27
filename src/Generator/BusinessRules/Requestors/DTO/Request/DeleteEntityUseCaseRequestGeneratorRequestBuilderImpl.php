<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\DeleteEntityUseCaseRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\DeleteEntityUseCaseRequestGeneratorRequestBuilder;

class DeleteEntityUseCaseRequestGeneratorRequestBuilderImpl implements DeleteEntityUseCaseRequestGeneratorRequestBuilder
{
    /**
     * @var DeleteEntityUseCaseRequestGeneratorRequestDTO
     */
    private $request;

    public function build(): DeleteEntityUseCaseRequestGeneratorRequest
    {
        return $this->request;
    }

    public function create(): DeleteEntityUseCaseRequestGeneratorRequestBuilder
    {
        $this->request = new DeleteEntityUseCaseRequestGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): DeleteEntityUseCaseRequestGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }
}
