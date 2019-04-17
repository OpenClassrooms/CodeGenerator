<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\GenericUseCaseListItemResponseAssemblerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\GenericUseCaseListItemResponseAssemblerGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseListItemResponseAssemblerGeneratorRequestBuilderImpl implements GenericUseCaseListItemResponseAssemblerGeneratorRequestBuilder
{
    /**
     * @var GenericUseCaseListItemResponseAssemblerGeneratorRequestDTO
     */
    private $request;

    public function create(): GenericUseCaseListItemResponseAssemblerGeneratorRequestBuilder
    {
        $this->request = new GenericUseCaseListItemResponseAssemblerGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): GenericUseCaseListItemResponseAssemblerGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    public function build(): GenericUseCaseListItemResponseAssemblerGeneratorRequest
    {
        return $this->request;
    }
}
