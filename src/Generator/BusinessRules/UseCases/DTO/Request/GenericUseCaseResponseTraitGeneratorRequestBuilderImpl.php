<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseResponseTraitGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseResponseTraitGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseResponseTraitGeneratorRequestBuilderImpl implements GenericUseCaseResponseTraitGeneratorRequestBuilder
{
    /**
     * @var GenericUseCaseResponseTraitGeneratorRequestDTO
     */
    private $request;

    public function create(): GenericUseCaseResponseTraitGeneratorRequestBuilder
    {
        $this->request = new GenericUseCaseResponseTraitGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): GenericUseCaseResponseTraitGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withFields(array $fields): GenericUseCaseResponseTraitGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }

    public function build(): GenericUseCaseResponseTraitGeneratorRequest
    {
        return $this->request;
    }
}
