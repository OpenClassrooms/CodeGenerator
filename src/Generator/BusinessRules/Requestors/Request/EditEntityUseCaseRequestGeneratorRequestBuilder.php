<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface EditEntityUseCaseRequestGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): EditEntityUseCaseRequestGeneratorRequest;

    public function create(): EditEntityUseCaseRequestGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): EditEntityUseCaseRequestGeneratorRequestBuilder;
}
