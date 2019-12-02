<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface EntityUseCaseCommonRequestTraitGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): EntityUseCaseCommonRequestTraitGeneratorRequest;

    public function create(): EntityUseCaseCommonRequestTraitGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): EntityUseCaseCommonRequestTraitGeneratorRequestBuilder;
}
