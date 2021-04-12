<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelDetailAssemblerImplTestGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelDetailAssemblerTestGeneratorRequest;

class ViewModelDetailAssemblerImplTestGeneratorRequestBuilderImpl implements ViewModelDetailAssemblerImplTestGeneratorRequestBuilder
{
    private ViewModelDetailAssemblerTestGeneratorRequestDTO $request;

    public function build(): ViewModelDetailAssemblerTestGeneratorRequest
    {
        return $this->request;
    }

    public function create(): ViewModelDetailAssemblerImplTestGeneratorRequestBuilder
    {
        $this->request = new ViewModelDetailAssemblerTestGeneratorRequestDTO();

        return $this;
    }

    public function withResponseClassName(
        string $responseClassName
    ): ViewModelDetailAssemblerImplTestGeneratorRequestBuilder {
        $this->request->responseClassName = $responseClassName;

        return $this;
    }
}
