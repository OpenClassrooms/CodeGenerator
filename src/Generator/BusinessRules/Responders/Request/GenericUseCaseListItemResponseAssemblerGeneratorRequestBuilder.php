<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GenericUseCaseListItemResponseAssemblerGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GenericUseCaseListItemResponseAssemblerGeneratorRequest;

    public function create(): GenericUseCaseListItemResponseAssemblerGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): GenericUseCaseListItemResponseAssemblerGeneratorRequestBuilder;
}
