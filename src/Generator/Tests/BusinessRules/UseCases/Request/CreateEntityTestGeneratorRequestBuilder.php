<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface CreateEntityTestGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): CreateEntityTestGeneratorRequest;

    public function create(): CreateEntityTestGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): CreateEntityTestGeneratorRequestBuilder;
}
