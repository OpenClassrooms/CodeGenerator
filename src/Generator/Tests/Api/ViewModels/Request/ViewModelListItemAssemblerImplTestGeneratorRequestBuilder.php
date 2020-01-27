<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request;

interface ViewModelListItemAssemblerImplTestGeneratorRequestBuilder
{
    public function build(): ViewModelListItemAssemblerImplTestGeneratorRequest;

    public function create(): ViewModelListItemAssemblerImplTestGeneratorRequestBuilder;

    public function withResponseClassName(
        string $responseClassName
    ): ViewModelListItemAssemblerImplTestGeneratorRequestBuilder;
}
