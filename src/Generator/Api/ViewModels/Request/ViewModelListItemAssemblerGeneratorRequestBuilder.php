<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface ViewModelListItemAssemblerGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): ViewModelListItemAssemblerGeneratorRequest;

    public function create(): ViewModelListItemAssemblerGeneratorRequestBuilder;

    public function withClassName(string $className): ViewModelListItemAssemblerGeneratorRequestBuilder;
}
