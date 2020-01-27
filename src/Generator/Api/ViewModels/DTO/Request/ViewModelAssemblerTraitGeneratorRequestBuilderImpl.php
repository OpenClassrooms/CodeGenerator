<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelAssemblerTraitGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelAssemblerTraitGeneratorRequestBuilder;

class ViewModelAssemblerTraitGeneratorRequestBuilderImpl implements ViewModelAssemblerTraitGeneratorRequestBuilder
{
    /**
     * @var ViewModelAssemblerTraitGeneratorRequestDTO
     */
    private $request;

    public function build(): ViewModelAssemblerTraitGeneratorRequest
    {
        return $this->request;
    }

    public function create(): ViewModelAssemblerTraitGeneratorRequestBuilder
    {
        $this->request = new ViewModelAssemblerTraitGeneratorRequestDTO();

        return $this;
    }

    public function withClassName(string $className): ViewModelAssemblerTraitGeneratorRequestBuilder
    {
        $this->request->className = $className;

        return $this;
    }
}
