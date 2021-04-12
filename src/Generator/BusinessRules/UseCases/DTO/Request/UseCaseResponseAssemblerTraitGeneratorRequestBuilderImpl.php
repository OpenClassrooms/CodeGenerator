<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseAssemblerTraitGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseAssemblerTraitGeneratorRequestBuilder;

class UseCaseResponseAssemblerTraitGeneratorRequestBuilderImpl implements UseCaseResponseAssemblerTraitGeneratorRequestBuilder
{
    private UseCaseResponseAssemblerTraitGeneratorRequestDTO $request;

    public function build(): UseCaseResponseAssemblerTraitGeneratorRequest
    {
        return $this->request;
    }

    public function create(): UseCaseResponseAssemblerTraitGeneratorRequestBuilder
    {
        $this->request = new UseCaseResponseAssemblerTraitGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entity): UseCaseResponseAssemblerTraitGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withFields(array $fields): UseCaseResponseAssemblerTraitGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }
}
