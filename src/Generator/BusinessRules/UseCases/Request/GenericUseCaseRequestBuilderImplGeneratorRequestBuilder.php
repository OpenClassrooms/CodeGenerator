<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GenericUseCaseRequestBuilderImplGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GenericUseCaseRequestBuilderImplGeneratorRequest;

    public function create(): GenericUseCaseRequestBuilderImplGeneratorRequestBuilder;

    public function withClassName(string $className): GenericUseCaseRequestBuilderImplGeneratorRequestBuilder;
}
