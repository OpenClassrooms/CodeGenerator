<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GetFunctionalEntityGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetFunctionalEntityGeneratorRequest;

    public function create(): GetFunctionalEntityGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): GetFunctionalEntityGeneratorRequestBuilder;
}
