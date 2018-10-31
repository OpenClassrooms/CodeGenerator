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

    public function create(): ViewModelTestGeneratorRequestBuilder
    {
        $this->request = new ViewModelTestGeneratorRequestDTO();

        return $this;
    }


    public function build(): ViewModelTestGeneratorRequest
    {
        return $this->request;
    }
}
