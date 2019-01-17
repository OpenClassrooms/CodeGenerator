<?php

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request;


use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelDetailAssemblerImplTestGeneratorRequest extends GeneratorRequest
{
    public function getViewModelDetailAssemblerImplClassName(): string;
}
