<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface UseCaseResponseTraitGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): UseCaseResponseTraitGeneratorRequest;

    public function create(): UseCaseResponseTraitGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entity
    ): UseCaseResponseTraitGeneratorRequestBuilder;

    /**
     * @param string[] $fields
     */
    public function withFields(
        array $fields
    ): UseCaseResponseTraitGeneratorRequestBuilder;
}
