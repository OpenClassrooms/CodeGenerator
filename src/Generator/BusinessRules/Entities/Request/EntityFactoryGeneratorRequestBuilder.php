<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Entities\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface EntityFactoryGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): EntityFactoryGeneratorRequest;

    public function create(): EntityFactoryGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): EntityFactoryGeneratorRequestBuilder;
}
