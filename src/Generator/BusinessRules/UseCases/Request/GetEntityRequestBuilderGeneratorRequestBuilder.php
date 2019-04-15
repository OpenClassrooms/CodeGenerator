<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GetEntityRequestBuilderGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetEntityRequestBuilderGeneratorRequest;

    public function create(): GetEntityRequestBuilderGeneratorRequestBuilder;

    public function withDefaultValue(
        string $defaultValue
    ): GetEntityRequestBuilderGeneratorRequestBuilder;
}
