<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelListItemStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelListItemStubGeneratorRequestBuilder;

class ViewModelListItemStubGeneratorRequestBuilderImpl implements ViewModelListItemStubGeneratorRequestBuilder
{
    private ViewModelListItemStubGeneratorRequestDTO $request;

    public function build(): ViewModelListItemStubGeneratorRequest
    {
        return $this->request;
    }

    public function create(): ViewModelListItemStubGeneratorRequestBuilder
    {
        $this->request = new ViewModelListItemStubGeneratorRequestDTO();

        return $this;
    }

    public function withClassName(string $className): ViewModelListItemStubGeneratorRequestBuilder
    {
        $this->request->className = $className;

        return $this;
    }
}
