<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GenericUseCaseResponseTraitGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GenericUseCaseResponseTraitGeneratorRequest;

    public function create(): GenericUseCaseResponseTraitGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): GenericUseCaseResponseTraitGeneratorRequestBuilder;

    /**
     * @param string[]
     */
    public function withFields(
        array $fields
    ): GenericUseCaseResponseTraitGeneratorRequestBuilder;
}
