<?php

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request;


/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelTestGeneratorRequestBuilderImpl implements ViewModelTestGeneratorRequestBuilder
{
    /**
     * @var ViewModelTestGeneratorRequest
     */
    private $request;

    public function create(string $argument): ViewModelTestGeneratorRequestBuilder
    {
        $this->request = new ViewModelTestGeneratorRequestDTO();
        $this->request->responseClassName = $argument;

        return $this;
    }


    public function build(): ViewModelTestGeneratorRequest
    {
        return $this->request;
    }
}
