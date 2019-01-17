<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelListItemImplGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): ViewModelListItemImplGeneratorRequest;

    public function create(): ViewModelListItemImplGeneratorRequestBuilder;

    public function withClassName(string $className): ViewModelListItemImplGeneratorRequestBuilder;
}
