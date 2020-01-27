<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface DeleteEntityUseCaseRequestGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): DeleteEntityUseCaseRequestGeneratorRequest;

    public function create(): DeleteEntityUseCaseRequestGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): DeleteEntityUseCaseRequestGeneratorRequestBuilder;
}
