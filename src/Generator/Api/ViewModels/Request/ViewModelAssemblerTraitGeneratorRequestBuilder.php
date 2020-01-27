<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface ViewModelAssemblerTraitGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): ViewModelAssemblerTraitGeneratorRequest;

    public function create(): ViewModelAssemblerTraitGeneratorRequestBuilder;

    public function withClassName(string $className): ViewModelAssemblerTraitGeneratorRequestBuilder;
}
