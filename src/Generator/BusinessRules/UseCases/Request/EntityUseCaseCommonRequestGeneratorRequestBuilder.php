<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface EntityUseCaseCommonRequestGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): EntityUseCaseCommonRequestGeneratorRequest;

    public function create(): EntityUseCaseCommonRequestGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): EntityUseCaseCommonRequestGeneratorRequestBuilder;
}
