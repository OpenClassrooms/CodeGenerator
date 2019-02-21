<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GenericUseCaseTestGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GenericUseCaseTestGeneratorRequest;

    public function create(): GenericUseCaseTestGeneratorRequestBuilder;

    public function withClassName(string $className): GenericUseCaseTestGeneratorRequestBuilder;
}
