<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface ViewModelDetailAssemblerGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): ViewModelDetailAssemblerGeneratorRequest;

    public function create(): ViewModelDetailAssemblerGeneratorRequestBuilder;

    public function withClassName(string $className): ViewModelDetailAssemblerGeneratorRequestBuilder;
}
