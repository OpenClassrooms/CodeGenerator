<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailAssemblerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailAssemblerGeneratorRequestBuilder;

class ViewModelDetailAssemblerGeneratorRequestBuilderImpl implements ViewModelDetailAssemblerGeneratorRequestBuilder
{
    private ViewModelDetailAssemblerGeneratorRequestDTO $request;

    public function build(): ViewModelDetailAssemblerGeneratorRequest
    {
        return $this->request;
    }

    public function create(): ViewModelDetailAssemblerGeneratorRequestBuilder
    {
        $this->request = new ViewModelDetailAssemblerGeneratorRequestDTO();

        return $this;
    }

    public function withClassName(string $className): ViewModelDetailAssemblerGeneratorRequestBuilder
    {
        $this->request->className = $className;

        return $this;
    }
}
