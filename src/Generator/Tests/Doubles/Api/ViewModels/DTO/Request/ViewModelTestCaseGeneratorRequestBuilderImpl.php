<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelTestCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelTestCaseGeneratorRequestBuilder;

class ViewModelTestCaseGeneratorRequestBuilderImpl implements ViewModelTestCaseGeneratorRequestBuilder
{
    /**
     * @var ViewModelTestCaseGeneratorRequestDTO
     */
    private $request;

    public function build(): ViewModelTestCaseGeneratorRequest
    {
        return $this->request;
    }

    public function create(): ViewModelTestCaseGeneratorRequestBuilder
    {
        $this->request = new ViewModelTestCaseGeneratorRequestDTO();

        return $this;
    }

    public function withClassName(string $className): ViewModelTestCaseGeneratorRequestBuilder
    {
        $this->request->className = $className;

        return $this;
    }
}
