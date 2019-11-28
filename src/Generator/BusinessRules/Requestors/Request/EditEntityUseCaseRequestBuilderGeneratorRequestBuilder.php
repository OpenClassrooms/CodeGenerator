<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface EditEntityUseCaseRequestBuilderGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): EditEntityUseCaseRequestBuilderGeneratorRequest;

    public function create(): EditEntityUseCaseRequestBuilderGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): EditEntityUseCaseRequestBuilderGeneratorRequestBuilder;
}
