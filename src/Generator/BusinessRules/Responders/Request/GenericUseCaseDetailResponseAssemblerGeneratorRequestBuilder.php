<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GenericUseCaseDetailResponseAssemblerGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GenericUseCaseDetailResponseAssemblerGeneratorRequest;

    public function create(): GenericUseCaseDetailResponseAssemblerGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): GenericUseCaseDetailResponseAssemblerGeneratorRequestBuilder;
}
