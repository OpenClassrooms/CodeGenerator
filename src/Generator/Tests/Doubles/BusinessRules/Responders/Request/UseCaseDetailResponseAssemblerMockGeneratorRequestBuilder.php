<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface UseCaseDetailResponseAssemblerMockGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): UseCaseDetailResponseAssemblerMockGeneratorRequest;

    public function create(): UseCaseDetailResponseAssemblerMockGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entity
    ): UseCaseDetailResponseAssemblerMockGeneratorRequestBuilder;
}
