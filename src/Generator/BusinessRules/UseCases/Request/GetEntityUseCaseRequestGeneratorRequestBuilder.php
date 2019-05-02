<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GetEntityUseCaseRequestGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetEntityUseCaseRequestGeneratorRequest;

    public function create(): GetEntityUseCaseRequestGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): GetEntityUseCaseRequestGeneratorRequestBuilder;
}
