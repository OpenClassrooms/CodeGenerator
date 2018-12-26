<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailImplGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelDetailImplGeneratorRequestBuilderImpl implements ViewModelDetailImplGeneratorRequestBuilder
{
    /**
     * @var ViewModelDetailImplGeneratorRequestDTO
     */
    private $request;

    public function build(): ViewModelDetailImplGeneratorRequest
    {
        return $this->request;
    }

    public function create(): ViewModelDetailImplGeneratorRequestBuilder
    {
        $this->request = new ViewModelDetailImplGeneratorRequestDTO();

        return $this;
    }

    public function withClassName(string $className): ViewModelDetailImplGeneratorRequestBuilder
    {
        $this->request->className = $className;

        return $this;
    }
}
