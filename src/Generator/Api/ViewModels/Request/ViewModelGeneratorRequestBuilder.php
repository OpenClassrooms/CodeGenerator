<?php

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelGeneratorRequestBuilder extends GeneratorRequest
{
    public function create(): ViewModelGeneratorRequestBuilder;

    public function withClassName(string $className): ViewModelGeneratorRequestBuilder;

    public function build(): ViewModelGeneratorRequest;
}
