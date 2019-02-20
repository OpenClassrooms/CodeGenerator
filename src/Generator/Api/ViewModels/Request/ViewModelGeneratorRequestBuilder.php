<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): ViewModelGeneratorRequest;

    public function create(): ViewModelGeneratorRequestBuilder;

    public function withClassName(string $className): ViewModelGeneratorRequestBuilder;
}
