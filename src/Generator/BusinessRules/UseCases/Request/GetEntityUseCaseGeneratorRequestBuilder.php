<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GetEntityUseCaseGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetEntityUseCaseGeneratorRequest;

    public function create(): GetEntityUseCaseGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): GetEntityUseCaseGeneratorRequestBuilder;
}
