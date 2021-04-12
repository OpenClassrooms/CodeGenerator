<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelListItemAssemblerImplTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelListItemAssemblerImplTestGeneratorRequestBuilder;

class ViewModelListItemAssemblerImplTestGeneratorRequestBuilderImpl implements ViewModelListItemAssemblerImplTestGeneratorRequestBuilder
{
    private ViewModelListItemAssemblerImplTestGeneratorRequestDTO $request;

    public function build(): ViewModelListItemAssemblerImplTestGeneratorRequest
    {
        return $this->request;
    }

    public function create(): ViewModelListItemAssemblerImplTestGeneratorRequestBuilder
    {
        $this->request = new ViewModelListItemAssemblerImplTestGeneratorRequestDTO();

        return $this;
    }

    public function withResponseClassName(
        string $responseClassName
    ): ViewModelListItemAssemblerImplTestGeneratorRequestBuilder {
        $this->request->responseClassName = $responseClassName;

        return $this;
    }
}
