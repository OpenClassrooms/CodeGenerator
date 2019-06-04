<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface UseCaseListItemResponseGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): UseCaseListItemResponseGeneratorRequest;

    public function create(): UseCaseListItemResponseGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entity
    ): UseCaseListItemResponseGeneratorRequestBuilder;
}
