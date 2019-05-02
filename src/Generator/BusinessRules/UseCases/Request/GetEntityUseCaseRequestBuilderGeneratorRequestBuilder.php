<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GetEntityUseCaseRequestBuilderGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetEntityUseCaseRequestBuilderGeneratorRequest;

    public function create(): GetEntityUseCaseRequestBuilderGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): GetEntityUseCaseRequestBuilderGeneratorRequestBuilder;
}
