<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface CreateEntityUseCaseRequestBuilderGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): CreateEntityUseCaseRequestBuilderGeneratorRequest;

    public function create(): CreateEntityUseCaseRequestBuilderGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): CreateEntityUseCaseRequestBuilderGeneratorRequestBuilder;
}
