<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface CreateEntityRequestGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): CreateEntityRequestGeneratorRequest;

    public function create(): CreateEntityRequestGeneratorRequestBuilder;

    public function withEntityClassName(string $entityClassName): CreateEntityRequestGeneratorRequestBuilder;
}
