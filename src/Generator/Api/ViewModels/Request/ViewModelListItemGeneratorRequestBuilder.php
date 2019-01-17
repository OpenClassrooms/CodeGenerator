<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelListItemGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): ViewModelListItemGeneratorRequest;

    public function create(): ViewModelListItemGeneratorRequestBuilder;

    public function withClassName(string $className): ViewModelListItemGeneratorRequestBuilder;
}
