<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemAssemblerImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemAssemblerImplGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelListItemAssemblerImplGeneratorRequestBuilderImpl implements ViewModelListItemAssemblerImplGeneratorRequestBuilder
{
    /**
 * @var ViewModelListItemAssemblerImplGeneratorRequestDTO
     */
    private $request;

public function build(): ViewModelListItemAssemblerImplGeneratorRequest
    {
        return $this->request;
    }

public function create(): ViewModelListItemAssemblerImplGeneratorRequestBuilder
    {
    $this->request = new ViewModelListItemAssemblerImplGeneratorRequestDTO();

        return $this;
    }

public function withClassName(string $className): ViewModelListItemAssemblerImplGeneratorRequestBuilder
    {
        $this->request->className = $className;

        return $this;
    }
}
