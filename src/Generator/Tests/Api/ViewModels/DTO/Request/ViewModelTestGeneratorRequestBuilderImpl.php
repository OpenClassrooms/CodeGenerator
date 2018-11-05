<?php

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelTestGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelTestGeneratorRequestBuilderImpl implements ViewModelTestGeneratorRequestBuilder
{
    /**
     * @var ViewModelTestGeneratorRequestDTO
     */
    private $request;

    public function create(): ViewModelTestGeneratorRequestBuilder
    {
        $this->request = new ViewModelTestGeneratorRequestDTO();

        return $this;
    }

    public function withResponseClassName(string $responseClassName): ViewModelTestGeneratorRequestBuilder
    {
        $this->request->responseClassName = $responseClassName;

        return $this;
    }

    public function build(): ViewModelTestGeneratorRequest
    {
        return $this->request;
    }
}
