<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface UseCaseListItemResponseAssemblerMockGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): UseCaseListItemResponseAssemblerMockGeneratorRequest;

    public function create(): UseCaseListItemResponseAssemblerMockGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entity
    ): UseCaseListItemResponseAssemblerMockGeneratorRequestBuilder;
}
