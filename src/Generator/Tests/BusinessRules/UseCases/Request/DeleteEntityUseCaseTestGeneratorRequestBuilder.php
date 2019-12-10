<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface DeleteEntityUseCaseTestGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): DeleteEntityUseCaseTestGeneratorRequest;

    public function create(): DeleteEntityUseCaseTestGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): DeleteEntityUseCaseTestGeneratorRequestBuilder;
}
