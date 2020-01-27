<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface DeleteEntityUseCaseRequestBuilderGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): DeleteEntityUseCaseRequestBuilderGeneratorRequest;

    public function create(): DeleteEntityUseCaseRequestBuilderGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): DeleteEntityUseCaseRequestBuilderGeneratorRequestBuilder;
}
