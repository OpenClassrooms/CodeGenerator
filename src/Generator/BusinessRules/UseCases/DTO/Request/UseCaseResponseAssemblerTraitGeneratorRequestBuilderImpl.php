<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseAssemblerTraitGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseAssemblerTraitGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseResponseAssemblerTraitGeneratorRequestBuilderImpl implements UseCaseResponseAssemblerTraitGeneratorRequestBuilder
{
    /**
     * @var UseCaseResponseAssemblerTraitGeneratorRequestDTO
     */
    private $request;

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

    public function build(): UseCaseResponseAssemblerTraitGeneratorRequest
    {
        return $this->request;
    }
}
