<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseListItemResponseDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseListItemResponseDTOGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseListItemResponseDTOGeneratorRequestBuilderImpl implements GenericUseCaseListItemResponseDTOGeneratorRequestBuilder
{
    /**
     * @var GenericUseCaseListItemResponseDTOGeneratorRequestDTO
     */
    private $request;

    public function create(): GenericUseCaseListItemResponseDTOGeneratorRequestBuilder
    {
        $this->request = new GenericUseCaseListItemResponseDTOGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): GenericUseCaseListItemResponseDTOGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withFields(array $fields): GenericUseCaseListItemResponseDTOGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }

    public function build(): GenericUseCaseListItemResponseDTOGeneratorRequest
    {
        return $this->request;
    }
}
