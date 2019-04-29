<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseResponseDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseResponseDTOGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseResponseDTOGeneratorRequestBuilderImpl implements GenericUseCaseResponseDTOGeneratorRequestBuilder
{
    /**
     * @var GenericUseCaseResponseDTOGeneratorRequestDTO
     */
    private $request;

    public function create(): GenericUseCaseResponseDTOGeneratorRequestBuilder
    {
        $this->request = new GenericUseCaseResponseDTOGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): GenericUseCaseResponseDTOGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withFields(array $fields): GenericUseCaseResponseDTOGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }

    public function build(): GenericUseCaseResponseDTOGeneratorRequest
    {
        return $this->request;
    }
}
