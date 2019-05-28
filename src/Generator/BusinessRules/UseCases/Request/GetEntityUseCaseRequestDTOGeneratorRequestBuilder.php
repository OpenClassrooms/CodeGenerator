<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GetEntityUseCaseRequestDTOGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetEntityUseCaseRequestDTOGeneratorRequest;

    public function create(): GetEntityUseCaseRequestDTOGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): GetEntityUseCaseRequestDTOGeneratorRequestBuilder;
}
