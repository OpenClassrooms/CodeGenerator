<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelDetailImplGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): ViewModelDetailImplGeneratorRequest;

    public function create(): ViewModelDetailImplGeneratorRequestBuilder;

    public function withClassName(string $className): ViewModelDetailImplGeneratorRequestBuilder;
}
