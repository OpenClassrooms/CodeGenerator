<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GenericUseCaseResponseGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GenericUseCaseResponseGeneratorRequest;

    public function create(): GenericUseCaseResponseGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): GenericUseCaseResponseGeneratorRequestBuilder;

    /**
     * @param string[] $fields
     */
    public function withFields(
        array $fields
    ): GenericUseCaseResponseGeneratorRequestBuilder;
}
