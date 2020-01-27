<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface UseCaseListItemResponseAssemblerGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): UseCaseListItemResponseAssemblerGeneratorRequest;

    public function create(): UseCaseListItemResponseAssemblerGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entity
    ): UseCaseListItemResponseAssemblerGeneratorRequestBuilder;
}
