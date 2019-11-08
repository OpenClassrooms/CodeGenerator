<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface CreateEntityGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): CreateEntityGeneratorRequest;

    public function create(): CreateEntityGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): CreateEntityGeneratorRequestBuilder;
}
