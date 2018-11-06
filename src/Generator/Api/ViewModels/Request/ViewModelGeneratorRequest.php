<?php

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelGeneratorRequest extends GeneratorRequest
{
    public function getClassName(): string;

    public function getNamespace(): string;

    public function getFields(): array;
}
