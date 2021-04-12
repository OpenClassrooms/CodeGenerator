<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseListItemResponseAssemblerImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseListItemResponseAssemblerImplGeneratorRequestBuilder;

class UseCaseListItemResponseAssemblerImplGeneratorRequestBuilderImpl implements UseCaseListItemResponseAssemblerImplGeneratorRequestBuilder
{
    private UseCaseListItemResponseAssemblerImplGeneratorRequestDTO $request;

    public function build(): UseCaseListItemResponseAssemblerImplGeneratorRequest
    {
        return $this->request;
    }

    public function create(): UseCaseListItemResponseAssemblerImplGeneratorRequestBuilder
    {
        $this->request = new UseCaseListItemResponseAssemblerImplGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entity): UseCaseListItemResponseAssemblerImplGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withFields(array $fields): UseCaseListItemResponseAssemblerImplGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }
}
