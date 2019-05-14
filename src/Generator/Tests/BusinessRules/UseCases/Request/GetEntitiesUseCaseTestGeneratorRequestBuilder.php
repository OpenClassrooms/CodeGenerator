<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GetEntitiesUseCaseTestGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetEntitiesUseCaseTestGeneratorRequest;

    public function create(): GetEntitiesUseCaseTestGeneratorRequestBuilder;

    public function withEntity(
        string $defaultValue
    ): GetEntitiesUseCaseTestGeneratorRequestBuilder;
}
