<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface UseCaseResponseDTOGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): UseCaseResponseDTOGeneratorRequest;

    public function create(): UseCaseResponseDTOGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entity
    ): UseCaseResponseDTOGeneratorRequestBuilder;

    /**
     * @param string[] $fields
     */
    public function withFields(
        array $fields
    ): UseCaseResponseDTOGeneratorRequestBuilder;
}
