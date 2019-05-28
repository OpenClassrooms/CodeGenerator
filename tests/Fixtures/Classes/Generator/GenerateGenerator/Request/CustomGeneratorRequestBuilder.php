<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author authorStub <author.stub@example.com>
 */
interface CustomGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): CustomGeneratorRequest;

    public function create(): CustomGeneratorRequestBuilder;

    public function withDefaultValue(
        string $defaultValue
    ): CustomGeneratorRequestBuilder;
}
