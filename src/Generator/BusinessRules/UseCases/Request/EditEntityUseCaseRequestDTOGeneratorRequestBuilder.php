<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface EditEntityUseCaseRequestDTOGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): EditEntityUseCaseRequestDTOGeneratorRequest;

    public function create(): EditEntityUseCaseRequestDTOGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): EditEntityUseCaseRequestDTOGeneratorRequestBuilder;
}
