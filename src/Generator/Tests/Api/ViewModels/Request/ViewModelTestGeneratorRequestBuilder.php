<?php

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelTestGeneratorRequestBuilder
{
    public function create(string $argument): ViewModelTestGeneratorRequestBuilder;

    public function build(): ViewModelTestGeneratorRequest;
}
