<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseDetailResponseAssemblerMockGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseDetailResponseAssemblerMockGeneratorRequestBuilder;

class UseCaseDetailResponseAssemblerMockGeneratorRequestBuilderImpl implements UseCaseDetailResponseAssemblerMockGeneratorRequestBuilder
{
    private UseCaseDetailResponseAssemblerMockGeneratorRequestDTO $request;

    public function build(): UseCaseDetailResponseAssemblerMockGeneratorRequest
    {
        return $this->request;
    }

    public function create(): UseCaseDetailResponseAssemblerMockGeneratorRequestBuilder
    {
        $this->request = new UseCaseDetailResponseAssemblerMockGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entity): UseCaseDetailResponseAssemblerMockGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }
}
