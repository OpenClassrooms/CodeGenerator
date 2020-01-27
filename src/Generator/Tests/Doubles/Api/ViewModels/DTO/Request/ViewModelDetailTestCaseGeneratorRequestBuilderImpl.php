<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelDetailTestCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelDetailTestCaseGeneratorRequestBuilder;

class ViewModelDetailTestCaseGeneratorRequestBuilderImpl implements ViewModelDetailTestCaseGeneratorRequestBuilder
{
    /**
     * @var ViewModelDetailTestCaseGeneratorRequestDTO
     */
    private $request;

    public function build(): ViewModelDetailTestCaseGeneratorRequest
    {
        return $this->request;
    }

    public function create(): ViewModelDetailTestCaseGeneratorRequestBuilder
    {
        $this->request = new ViewModelDetailTestCaseGeneratorRequestDTO();

        return $this;
    }

    public function withClassName(string $className): ViewModelDetailTestCaseGeneratorRequestBuilder
    {
        $this->request->className = $className;

        return $this;
    }
}
