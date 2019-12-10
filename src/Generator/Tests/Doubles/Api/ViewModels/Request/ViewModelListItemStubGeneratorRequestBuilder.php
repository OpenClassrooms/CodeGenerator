<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface ViewModelListItemStubGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): ViewModelListItemStubGeneratorRequest;

    public function create(): ViewModelListItemStubGeneratorRequestBuilder;

    public function withClassName(string $className): ViewModelListItemStubGeneratorRequestBuilder;
}
