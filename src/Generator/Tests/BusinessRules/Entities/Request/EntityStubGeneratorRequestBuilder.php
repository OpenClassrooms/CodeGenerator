<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
interface EntityStubGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): EntityStubGeneratorRequest;

    public function create(): EntityStubGeneratorRequestBuilder;

    public function withClassName(string $className): EntityStubGeneratorRequestBuilder;
}
