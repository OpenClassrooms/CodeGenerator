<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GetEntityUseCaseRequestBuilderGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetEntityUseCaseRequestBuilderGeneratorRequest;

    public function create(): GetEntityUseCaseRequestBuilderGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entity
    ): GetEntityUseCaseRequestBuilderGeneratorRequestBuilder;
}
