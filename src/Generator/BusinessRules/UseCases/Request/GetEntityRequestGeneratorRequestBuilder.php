<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GetEntityRequestGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetEntityRequestGeneratorRequest;

    public function create(): GetEntityRequestGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): GetEntityRequestGeneratorRequestBuilder;
}
