<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Models\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface EntityModelTraitGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): EntityModelTraitGeneratorRequest;

    public function create(): EntityModelTraitGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): EntityModelTraitGeneratorRequestBuilder;
}
