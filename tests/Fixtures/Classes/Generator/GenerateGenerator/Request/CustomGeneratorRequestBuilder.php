<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface CustomGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): CustomGeneratorRequest;

    public function create(): CustomGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): CustomGeneratorRequestBuilder;
}
