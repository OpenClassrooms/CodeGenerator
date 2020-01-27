<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GetEntityUseCaseTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GetEntityUseCaseTestGeneratorRequestBuilder;

class GetEntityUseCaseTestGeneratorRequestBuilderImpl implements GetEntityUseCaseTestGeneratorRequestBuilder
{
    /**
     * @var GetEntityUseCaseTestGeneratorRequestDTO
     */
    private $request;

    public function build(): GetEntityUseCaseTestGeneratorRequest
    {
        return $this->request;
    }

    public function create(): GetEntityUseCaseTestGeneratorRequestBuilder
    {
        $this->request = new GetEntityUseCaseTestGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entity): GetEntityUseCaseTestGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }
}
