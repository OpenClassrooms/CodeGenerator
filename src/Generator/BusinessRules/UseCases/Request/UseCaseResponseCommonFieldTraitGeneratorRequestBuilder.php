<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface UseCaseResponseCommonFieldTraitGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): UseCaseResponseCommonFieldTraitGeneratorRequest;

    public function create(): UseCaseResponseCommonFieldTraitGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entity
    ): UseCaseResponseCommonFieldTraitGeneratorRequestBuilder;

    /**
     * @param string[] $fields
     */
    public function withFields(
        array $fields
    ): UseCaseResponseCommonFieldTraitGeneratorRequestBuilder;
}
