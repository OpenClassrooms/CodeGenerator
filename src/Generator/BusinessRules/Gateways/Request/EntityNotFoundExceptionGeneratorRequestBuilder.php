<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface EntityNotFoundExceptionGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): EntityNotFoundExceptionGeneratorRequest;

    public function create(): EntityNotFoundExceptionGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entity
    ): EntityNotFoundExceptionGeneratorRequestBuilder;
}
