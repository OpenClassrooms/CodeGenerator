<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface CreateEntityRequestDTOGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): CreateEntityRequestDTOGeneratorRequest;

    public function create(): CreateEntityRequestDTOGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): CreateEntityRequestDTOGeneratorRequestBuilder;
}
