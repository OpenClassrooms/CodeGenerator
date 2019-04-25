<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GenericUseCaseListItemResponseAssemblerImplGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GenericUseCaseListItemResponseAssemblerImplGeneratorRequest;

    public function create(): GenericUseCaseListItemResponseAssemblerImplGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): GenericUseCaseListItemResponseAssemblerImplGeneratorRequestBuilder;

    /**
     * @param string[] $fields
     */
    public function withFields(array $fields): GenericUseCaseListItemResponseAssemblerImplGeneratorRequestBuilder;
}
