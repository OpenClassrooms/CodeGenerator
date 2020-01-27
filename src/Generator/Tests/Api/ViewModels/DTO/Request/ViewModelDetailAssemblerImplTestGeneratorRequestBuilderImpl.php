<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelDetailAssemblerImplTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelDetailAssemblerImplTestGeneratorRequestBuilder;

class ViewModelDetailAssemblerImplTestGeneratorRequestBuilderImpl implements ViewModelDetailAssemblerImplTestGeneratorRequestBuilder
{
    /**
     * @var ViewModelDetailAssemblerImplTestGeneratorRequestDTO
     */
    private $request;

    public function build(): ViewModelDetailAssemblerImplTestGeneratorRequest
    {
        return $this->request;
    }

    public function create(): ViewModelDetailAssemblerImplTestGeneratorRequestBuilder
    {
        $this->request = new ViewModelDetailAssemblerImplTestGeneratorRequestDTO();

        return $this;
    }

    public function withResponseClassName(
        string $responseClassName
    ): ViewModelDetailAssemblerImplTestGeneratorRequestBuilder {
        $this->request->responseClassName = $responseClassName;

        return $this;
    }
}
