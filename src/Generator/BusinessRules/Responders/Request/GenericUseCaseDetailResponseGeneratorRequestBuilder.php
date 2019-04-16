<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GenericUseCaseDetailResponseGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GenericUseCaseDetailResponseGeneratorRequest;

    public function create(): GenericUseCaseDetailResponseGeneratorRequestBuilder;

    public function withEntity(
        string $defaultValue
    ): GenericUseCaseDetailResponseGeneratorRequestBuilder;
}
