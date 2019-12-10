<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelGeneratorRequestBuilder;

class ViewModelGeneratorRequestBuilderImpl implements ViewModelGeneratorRequestBuilder
{
    /**
     * @var ViewModelGeneratorRequestDTO
     */
    private $request;

    public function build(): ViewModelGeneratorRequest
    {
        return $this->request;
    }

    public function create(): ViewModelGeneratorRequestBuilder
    {
        $this->request = new ViewModelGeneratorRequestDTO();

        return $this;
    }

    public function withClassName(string $className): ViewModelGeneratorRequestBuilder
    {
        $this->request->className = $className;

        return $this;
    }
}
