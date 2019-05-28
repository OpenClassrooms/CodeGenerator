<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseDetailResponseDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseDetailResponseDTOGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseDetailResponseDTOGeneratorRequestBuilderImpl implements UseCaseDetailResponseDTOGeneratorRequestBuilder
{
    /**
     * @var UseCaseDetailResponseDTOGeneratorRequestDTO
     */
    private $request;

    public function create(): UseCaseDetailResponseDTOGeneratorRequestBuilder
    {
        $this->request = new UseCaseDetailResponseDTOGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): UseCaseDetailResponseDTOGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withFields(array $fields): UseCaseDetailResponseDTOGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }

    public function build(): UseCaseDetailResponseDTOGeneratorRequest
    {
        return $this->request;
    }
}
