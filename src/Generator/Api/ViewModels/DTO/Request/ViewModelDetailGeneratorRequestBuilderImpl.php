<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailGeneratorRequestBuilder;

class ViewModelDetailGeneratorRequestBuilderImpl implements ViewModelDetailGeneratorRequestBuilder
{
    /**
     * @var ViewModelDetailGeneratorRequestDTO
     */
    private $request;

    public function build(): ViewModelDetailGeneratorRequest
    {
        return $this->request;
    }

    public function create(): ViewModelDetailGeneratorRequestBuilder
    {
        $this->request = new ViewModelDetailGeneratorRequestDTO();

        return $this;
    }

    public function withClassName(string $className): ViewModelDetailGeneratorRequestBuilder
    {
        $this->request->className = $className;

        return $this;
    }
}
