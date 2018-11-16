<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModelsDetail\Request\ViewModelDetailGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModelsDetail\Request\ViewModelDetailGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
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