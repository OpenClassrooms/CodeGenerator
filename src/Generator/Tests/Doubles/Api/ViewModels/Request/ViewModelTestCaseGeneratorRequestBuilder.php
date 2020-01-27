<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface ViewModelTestCaseGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): ViewModelTestCaseGeneratorRequest;

    public function create(): ViewModelTestCaseGeneratorRequestBuilder;

    public function withClassName(string $className): ViewModelTestCaseGeneratorRequestBuilder;
}
