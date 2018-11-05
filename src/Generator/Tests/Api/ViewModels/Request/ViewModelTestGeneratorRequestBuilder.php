<?php

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelTestGeneratorRequestBuilder
{
    public function create(): ViewModelTestGeneratorRequestBuilder;

    public function withResponseClassName(string $responseClassName): ViewModelTestGeneratorRequestBuilder;

    public function build(): ViewModelTestGeneratorRequest;
}
