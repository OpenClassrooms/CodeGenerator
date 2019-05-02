<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseDTOGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseResponseDTOGeneratorRequestBuilderImpl implements UseCaseResponseDTOGeneratorRequestBuilder
{
    /**
     * @var UseCaseResponseDTOGeneratorRequestDTO
     */
    private $request;

    public function create(): UseCaseResponseDTOGeneratorRequestBuilder
    {
        $this->request = new UseCaseResponseDTOGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): UseCaseResponseDTOGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withFields(array $fields): UseCaseResponseDTOGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }

    public function build(): UseCaseResponseDTOGeneratorRequest
    {
        return $this->request;
    }
}
