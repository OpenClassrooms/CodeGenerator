<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface CreateRequestTraitGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): CreateRequestTraitGeneratorRequest;

    public function create(): CreateRequestTraitGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): CreateRequestTraitGeneratorRequestBuilder;
}
