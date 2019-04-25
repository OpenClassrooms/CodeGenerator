<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseListItemResponseAssemblerImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseListItemResponseAssemblerImplGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseListItemResponseAssemblerImplGeneratorRequestBuilderImpl implements GenericUseCaseListItemResponseAssemblerImplGeneratorRequestBuilder
{
    /**
     * @var GenericUseCaseListItemResponseAssemblerImplGeneratorRequestDTO
     */
    private $request;

    public function create(): GenericUseCaseListItemResponseAssemblerImplGeneratorRequestBuilder
    {
        $this->request = new GenericUseCaseListItemResponseAssemblerImplGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): GenericUseCaseListItemResponseAssemblerImplGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withFields(array $fields): GenericUseCaseListItemResponseAssemblerImplGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }

    public function build(): GenericUseCaseListItemResponseAssemblerImplGeneratorRequest
    {
        return $this->request;
    }
}
