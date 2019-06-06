<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelListItemAssemblerImplTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelListItemAssemblerImplTestGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelListItemAssemblerImplTestGeneratorRequestBuilderImpl implements ViewModelListItemAssemblerImplTestGeneratorRequestBuilder
{
    /**
     * @var ViewModelListItemAssemblerImplTestGeneratorRequestDTO
     */
    private $request;

    public function create(): ViewModelListItemAssemblerImplTestGeneratorRequestBuilder
    {
        $this->request = new ViewModelListItemAssemblerImplTestGeneratorRequestDTO();

        return $this;
    }

    public function withResponseClassName(
        string $responseClassName
    ): ViewModelListItemAssemblerImplTestGeneratorRequestBuilder {
        $this->request->responseClassName = $responseClassName;

        return $this;
    }

    public function build(): ViewModelListItemAssemblerImplTestGeneratorRequest
    {
        return $this->request;
    }
}
