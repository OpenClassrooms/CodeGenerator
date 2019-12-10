<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelListItemTestCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelListItemTestCaseGeneratorRequestBuilder;

class ViewModelListItemTestCaseGeneratorRequestBuilderImpl implements ViewModelListItemTestCaseGeneratorRequestBuilder
{
    /**
     * @var ViewModelListItemTestCaseGeneratorRequestDTO
     */
    private $request;

    public function build(): ViewModelListItemTestCaseGeneratorRequest
    {
        return $this->request;
    }

    public function create(): ViewModelListItemTestCaseGeneratorRequestBuilder
    {
        $this->request = new ViewModelListItemTestCaseGeneratorRequestDTO();

        return $this;
    }

    public function withClassName(string $className): ViewModelListItemTestCaseGeneratorRequestBuilder
    {
        $this->request->className = $className;

        return $this;
    }
}
