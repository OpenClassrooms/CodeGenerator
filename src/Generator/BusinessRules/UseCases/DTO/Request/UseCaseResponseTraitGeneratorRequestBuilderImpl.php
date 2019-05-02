<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseTraitGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseTraitGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseResponseTraitGeneratorRequestBuilderImpl implements UseCaseResponseTraitGeneratorRequestBuilder
{
    /**
     * @var UseCaseResponseTraitGeneratorRequestDTO
     */
    private $request;

    public function create(): UseCaseResponseTraitGeneratorRequestBuilder
    {
        $this->request = new UseCaseResponseTraitGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): UseCaseResponseTraitGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withFields(array $fields): UseCaseResponseTraitGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }

    public function build(): UseCaseResponseTraitGeneratorRequest
    {
        return $this->request;
    }
}
