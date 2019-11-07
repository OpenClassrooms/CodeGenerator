<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface CreateEntityRequestBuilderGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): CreateEntityRequestBuilderGeneratorRequest;

    public function create(): CreateEntityRequestBuilderGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): CreateEntityRequestBuilderGeneratorRequestBuilder;
}
