<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelAssemblerTraitGeneratorRequestBuilder extends GeneratorRequest
{
    public function create(): ViewModelAssemblerTraitGeneratorRequestBuilder;

    public function withClassName(string $className): ViewModelAssemblerTraitGeneratorRequestBuilder;

    public function build(): ViewModelAssemblerTraitGeneratorRequest;
}
