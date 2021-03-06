<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request;

interface ViewModelDetailAssemblerImplTestGeneratorRequestBuilder
{
    public function build(): ViewModelDetailAssemblerTestGeneratorRequest;

    public function create(): ViewModelDetailAssemblerImplTestGeneratorRequestBuilder;

    public function withResponseClassName(
        string $responseClassName
    ): ViewModelDetailAssemblerImplTestGeneratorRequestBuilder;
}
