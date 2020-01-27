<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseGeneratorRequestBuilder;

class GetEntityUseCaseGeneratorRequestBuilderImpl implements GetEntityUseCaseGeneratorRequestBuilder
{
    /**
     * @var GetEntityUseCaseGeneratorRequestDTO
     */
    private $request;

    public function build(): GetEntityUseCaseGeneratorRequest
    {
        return $this->request;
    }

    public function create(): GetEntityUseCaseGeneratorRequestBuilder
    {
        $this->request = new GetEntityUseCaseGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entity): GetEntityUseCaseGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }
}
