<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface UseCaseDetailResponseGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): UseCaseDetailResponseGeneratorRequest;

    public function create(): UseCaseDetailResponseGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): UseCaseDetailResponseGeneratorRequestBuilder;

    /**
     * @param string[] $fields
     */
    public function withFields(
        array $fields
    ): UseCaseDetailResponseGeneratorRequestBuilder;
}
