<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface ViewModelListItemTestCaseGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): ViewModelListItemTestCaseGeneratorRequest;

    public function create(): ViewModelListItemTestCaseGeneratorRequestBuilder;

    public function withClassName(string $className): ViewModelListItemTestCaseGeneratorRequestBuilder;
}
