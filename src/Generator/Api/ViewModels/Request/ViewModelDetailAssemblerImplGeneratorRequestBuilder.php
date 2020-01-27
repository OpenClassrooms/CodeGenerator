<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface ViewModelDetailAssemblerImplGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): ViewModelDetailAssemblerImplGeneratorRequest;

    public function create(): ViewModelDetailAssemblerImplGeneratorRequestBuilder;

    public function withClassName(string $className): ViewModelDetailAssemblerImplGeneratorRequestBuilder;
}
