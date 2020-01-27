<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GetEntityUseCaseRequestGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetEntityUseCaseRequestGeneratorRequest;

    public function create(): GetEntityUseCaseRequestGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entity
    ): GetEntityUseCaseRequestGeneratorRequestBuilder;
}
