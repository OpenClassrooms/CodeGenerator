<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GenericUseCaseListItemResponseDTOGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GenericUseCaseListItemResponseDTOGeneratorRequest;

    public function create(): GenericUseCaseListItemResponseDTOGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): GenericUseCaseListItemResponseDTOGeneratorRequestBuilder;

    /**
     * @param string[] $entity
     */
    public function withFields(
        array $entity
    ): GenericUseCaseListItemResponseDTOGeneratorRequestBuilder;
}
