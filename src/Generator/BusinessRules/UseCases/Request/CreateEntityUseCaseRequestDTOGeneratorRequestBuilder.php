<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface CreateEntityUseCaseRequestDTOGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): CreateEntityUseCaseRequestDTOGeneratorRequest;

    public function create(): CreateEntityUseCaseRequestDTOGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): CreateEntityUseCaseRequestDTOGeneratorRequestBuilder;
}
