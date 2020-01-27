<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GetEntitiesUseCaseRequestGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetEntitiesUseCaseRequestGeneratorRequest;

    public function create(): GetEntitiesUseCaseRequestGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): GetEntitiesUseCaseRequestGeneratorRequestBuilder;
}
