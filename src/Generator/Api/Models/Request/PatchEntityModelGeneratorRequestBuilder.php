<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Models\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface PatchEntityModelGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): PatchEntityModelGeneratorRequest;

    public function create(): PatchEntityModelGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): PatchEntityModelGeneratorRequestBuilder;
}
