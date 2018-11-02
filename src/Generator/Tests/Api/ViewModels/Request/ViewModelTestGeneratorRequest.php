<?php

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request;


use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelTestGeneratorRequest extends GeneratorRequest
{
    public function getResponseClassName(): string;
}
