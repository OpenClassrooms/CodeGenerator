<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Models\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface PostEntityModelGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): PostEntityModelGeneratorRequest;

    public function create(): PostEntityModelGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): PostEntityModelGeneratorRequestBuilder;
}
