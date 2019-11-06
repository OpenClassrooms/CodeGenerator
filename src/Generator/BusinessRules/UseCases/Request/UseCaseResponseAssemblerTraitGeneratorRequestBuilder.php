<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface UseCaseResponseAssemblerTraitGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): UseCaseResponseAssemblerTraitGeneratorRequest;

    public function create(): UseCaseResponseAssemblerTraitGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entity
    ): UseCaseResponseAssemblerTraitGeneratorRequestBuilder;

    /**
     * @param string[] $fields
     */
    public function withFields(
        array $fields
    ): UseCaseResponseAssemblerTraitGeneratorRequestBuilder;
}
