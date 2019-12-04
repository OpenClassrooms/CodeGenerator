<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface ViewModelDetailTestCaseGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): ViewModelDetailTestCaseGeneratorRequest;

    public function create(): ViewModelDetailTestCaseGeneratorRequestBuilder;

    public function withClassName(string $className): ViewModelDetailTestCaseGeneratorRequestBuilder;
}
