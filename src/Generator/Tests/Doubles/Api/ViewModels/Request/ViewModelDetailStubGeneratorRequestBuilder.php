<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface ViewModelDetailStubGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): ViewModelDetailStubGeneratorRequest;

    public function create(): ViewModelDetailStubGeneratorRequestBuilder;

    public function withClassName(string $className): ViewModelDetailStubGeneratorRequestBuilder;
}
