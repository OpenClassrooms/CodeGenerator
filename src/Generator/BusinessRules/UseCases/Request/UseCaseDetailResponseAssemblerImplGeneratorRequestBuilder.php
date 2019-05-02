<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface UseCaseDetailResponseAssemblerImplGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): UseCaseDetailResponseAssemblerImplGeneratorRequest;

    public function create(): UseCaseDetailResponseAssemblerImplGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): UseCaseDetailResponseAssemblerImplGeneratorRequestBuilder;

    /**
     * @param string[] $fields
     */
    public function withFields(
        array $fields
    ): UseCaseDetailResponseAssemblerImplGeneratorRequestBuilder;
}
