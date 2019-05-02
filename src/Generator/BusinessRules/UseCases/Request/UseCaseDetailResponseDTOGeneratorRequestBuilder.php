<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface UseCaseDetailResponseDTOGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): UseCaseDetailResponseDTOGeneratorRequest;

    public function create(): UseCaseDetailResponseDTOGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): UseCaseDetailResponseDTOGeneratorRequestBuilder;

    /**
     * @param string[] $fields
     */
    public function withFields(
        array $fields
    ): UseCaseDetailResponseDTOGeneratorRequestBuilder;
}
