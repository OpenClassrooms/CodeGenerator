<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GenericUseCaseListItemResponseGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GenericUseCaseListItemResponseGeneratorRequest;

    public function create(): GenericUseCaseListItemResponseGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): GenericUseCaseListItemResponseGeneratorRequestBuilder;
}
