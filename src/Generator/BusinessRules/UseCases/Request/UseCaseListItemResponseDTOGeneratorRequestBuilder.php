<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface UseCaseListItemResponseDTOGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): UseCaseListItemResponseDTOGeneratorRequest;

    public function create(): UseCaseListItemResponseDTOGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): UseCaseListItemResponseDTOGeneratorRequestBuilder;

    /**
     * @param string[] $entity
     */
    public function withFields(
        array $entity
    ): UseCaseListItemResponseDTOGeneratorRequestBuilder;
}
