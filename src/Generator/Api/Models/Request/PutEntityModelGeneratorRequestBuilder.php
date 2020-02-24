<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Models\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface PutEntityModelGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): PutEntityModelGeneratorRequest;

    public function create(): PutEntityModelGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): PutEntityModelGeneratorRequestBuilder;
}
