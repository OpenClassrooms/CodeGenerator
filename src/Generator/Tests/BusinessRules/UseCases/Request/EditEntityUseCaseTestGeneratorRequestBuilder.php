<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface EditEntityUseCaseTestGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): EditEntityUseCaseTestGeneratorRequest;

    public function create(): EditEntityUseCaseTestGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): EditEntityUseCaseTestGeneratorRequestBuilder;
}
