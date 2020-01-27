<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface ViewModelDetailGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): ViewModelDetailGeneratorRequest;

    public function create(): ViewModelDetailGeneratorRequestBuilder;

    public function withClassName(string $className): ViewModelDetailGeneratorRequestBuilder;
}
