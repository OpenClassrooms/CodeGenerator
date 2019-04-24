<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GenericUseCaseDetailResponseDTOGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GenericUseCaseDetailResponseDTOGeneratorRequest;

    public function create(): GenericUseCaseDetailResponseDTOGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): GenericUseCaseDetailResponseDTOGeneratorRequestBuilder;

    /**
     * @param string[] $fields
     */
    public function withFields(
        array $fields
    ): GenericUseCaseDetailResponseDTOGeneratorRequestBuilder;
}
