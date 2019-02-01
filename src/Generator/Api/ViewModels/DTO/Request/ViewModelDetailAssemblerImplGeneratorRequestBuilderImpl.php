<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailAssemblerImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailAssemblerImplGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelDetailAssemblerImplGeneratorRequestBuilderImpl implements ViewModelDetailAssemblerImplGeneratorRequestBuilder
{
    /**
 * @var ViewModelDetailAssemblerImplGeneratorRequestDTO
     */
    private $request;

public function build(): ViewModelDetailAssemblerImplGeneratorRequest
    {
        return $this->request;
    }

public function create(): ViewModelDetailAssemblerImplGeneratorRequestBuilder
    {
    $this->request = new ViewModelDetailAssemblerImplGeneratorRequestDTO();

        return $this;
    }

public function withClassName(string $className): ViewModelDetailAssemblerImplGeneratorRequestBuilder
    {
        $this->request->className = $className;

        return $this;
    }
}
