<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelDetailStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelDetailStubGeneratorRequestBuilder;

class ViewModelDetailStubGeneratorRequestBuilderImpl implements ViewModelDetailStubGeneratorRequestBuilder
{
    /**
     * @var ViewModelDetailStubGeneratorRequestDTO
     */
    private $request;

    public function build(): ViewModelDetailStubGeneratorRequest
    {
        return $this->request;
    }

    public function create(): ViewModelDetailStubGeneratorRequestBuilder
    {
        $this->request = new ViewModelDetailStubGeneratorRequestDTO();

        return $this;
    }

    public function withClassName(string $className): ViewModelDetailStubGeneratorRequestBuilder
    {
        $this->request->className = $className;

        return $this;
    }
}
