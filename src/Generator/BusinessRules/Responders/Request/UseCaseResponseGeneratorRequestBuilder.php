<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface UseCaseResponseGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): UseCaseResponseGeneratorRequest;

    public function create(): UseCaseResponseGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): UseCaseResponseGeneratorRequestBuilder;

    /**
     * @param string[] $fields
     */
    public function withFields(
        array $fields
    ): UseCaseResponseGeneratorRequestBuilder;
}
