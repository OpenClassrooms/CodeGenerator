<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GetEntityRequestDTOGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetEntityRequestDTOGeneratorRequest;

    public function create(): GetEntityRequestDTOGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): GetEntityRequestDTOGeneratorRequestBuilder;
}
