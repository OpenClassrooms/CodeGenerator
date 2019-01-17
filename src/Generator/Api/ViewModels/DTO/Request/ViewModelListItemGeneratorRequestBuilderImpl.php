<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelListItemGeneratorRequestBuilderImpl implements ViewModelListItemGeneratorRequestBuilder
{
    /**
     * @var ViewModelListItemGeneratorRequestDTO
     */
    private $request;

    public function build(): ViewModelListItemGeneratorRequest
    {
        return $this->request;
    }

    public function create(): ViewModelListItemGeneratorRequestBuilder
    {
        $this->request = new ViewModelListItemGeneratorRequestDTO();

        return $this;
    }

    public function withClassName(string $className): ViewModelListItemGeneratorRequestBuilder
    {
        $this->request->className = $className;

        return $this;
    }
}
