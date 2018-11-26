<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
interface ViewModelStubGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): ViewModelStubGeneratorRequest;

    public function create(): ViewModelStubGeneratorRequestBuilder;

    public function withClassName(string $className): ViewModelStubGeneratorRequestBuilder;
}
