<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GetEntitiesUseCaseGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetEntitiesUseCaseGeneratorRequest;

    public function create(): GetEntitiesUseCaseGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): GetEntitiesUseCaseGeneratorRequestBuilder;
}
