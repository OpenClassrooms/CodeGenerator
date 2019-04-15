<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GetEntityRequestBuilderImplGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetEntityRequestBuilderImplGeneratorRequest;

    public function create(): GetEntityRequestBuilderImplGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): GetEntityRequestBuilderImplGeneratorRequestBuilder;
}
