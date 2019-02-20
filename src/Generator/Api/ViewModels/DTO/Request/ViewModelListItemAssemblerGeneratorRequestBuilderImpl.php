<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemAssemblerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemAssemblerGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelListItemAssemblerGeneratorRequestBuilderImpl implements ViewModelListItemAssemblerGeneratorRequestBuilder
{
    /**
     * @var ViewModelListItemAssemblerGeneratorRequestDTO
     */
    private $request;

    public function build(): ViewModelListItemAssemblerGeneratorRequest
    {
        return $this->request;
    }

    public function create(): ViewModelListItemAssemblerGeneratorRequestBuilder
    {
        $this->request = new ViewModelListItemAssemblerGeneratorRequestDTO();

        return $this;
    }

    public function withClassName(string $className): ViewModelListItemAssemblerGeneratorRequestBuilder
    {
        $this->request->className = $className;

        return $this;
    }
}
