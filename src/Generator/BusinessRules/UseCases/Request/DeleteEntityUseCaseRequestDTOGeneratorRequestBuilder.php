<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface DeleteEntityUseCaseRequestDTOGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): DeleteEntityUseCaseRequestDTOGeneratorRequest;

    public function create(): DeleteEntityUseCaseRequestDTOGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): DeleteEntityUseCaseRequestDTOGeneratorRequestBuilder;
}
