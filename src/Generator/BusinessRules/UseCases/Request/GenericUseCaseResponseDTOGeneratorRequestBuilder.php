<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GenericUseCaseResponseDTOGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GenericUseCaseResponseDTOGeneratorRequest;

    public function create(): GenericUseCaseResponseDTOGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): GenericUseCaseResponseDTOGeneratorRequestBuilder;

    /**
     * @param string[]
     */
    public function withFields(
        array $fields
    ): GenericUseCaseResponseDTOGeneratorRequestBuilder;
}
