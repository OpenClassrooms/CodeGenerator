<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseListItemResponseDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseListItemResponseDTOGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseListItemResponseDTOGeneratorRequestBuilderImpl implements UseCaseListItemResponseDTOGeneratorRequestBuilder
{
    /**
     * @var UseCaseListItemResponseDTOGeneratorRequestDTO
     */
    private $request;

    public function create(): UseCaseListItemResponseDTOGeneratorRequestBuilder
    {
        $this->request = new UseCaseListItemResponseDTOGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): UseCaseListItemResponseDTOGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withFields(array $fields): UseCaseListItemResponseDTOGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }

    public function build(): UseCaseListItemResponseDTOGeneratorRequest
    {
        return $this->request;
    }
}
