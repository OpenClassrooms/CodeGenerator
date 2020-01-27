<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemImplGeneratorRequestBuilder;

class ViewModelListItemImplGeneratorRequestBuilderImpl implements ViewModelListItemImplGeneratorRequestBuilder
{
    /**
     * @var ViewModelListItemImplGeneratorRequestDTO
     */
    private $request;

    public function build(): ViewModelListItemImplGeneratorRequest
    {
        return $this->request;
    }

    public function create(): ViewModelListItemImplGeneratorRequestBuilder
    {
        $this->request = new ViewModelListItemImplGeneratorRequestDTO();

        return $this;
    }

    public function withClassName(string $className): ViewModelListItemImplGeneratorRequestBuilder
    {
        $this->request->className = $className;

        return $this;
    }
}
