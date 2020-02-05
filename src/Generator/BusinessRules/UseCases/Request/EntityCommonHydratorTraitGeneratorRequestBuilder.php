<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface EntityCommonHydratorTraitGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): EntityCommonHydratorTraitGeneratorRequest;

    public function create(): EntityCommonHydratorTraitGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): EntityCommonHydratorTraitGeneratorRequestBuilder;
}
