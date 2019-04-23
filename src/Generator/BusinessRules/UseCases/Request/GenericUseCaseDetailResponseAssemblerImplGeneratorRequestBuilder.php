<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GenericUseCaseDetailResponseAssemblerImplGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GenericUseCaseDetailResponseAssemblerImplGeneratorRequest;

    public function create(): GenericUseCaseDetailResponseAssemblerImplGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): GenericUseCaseDetailResponseAssemblerImplGeneratorRequestBuilder;

    /**
     * @param string[] $fields
     */
    public function withFields(
        array $fields
    ): GenericUseCaseDetailResponseAssemblerImplGeneratorRequestBuilder;
}
