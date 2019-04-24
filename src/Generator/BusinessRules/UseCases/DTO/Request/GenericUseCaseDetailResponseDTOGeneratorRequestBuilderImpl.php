<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseDetailResponseDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseDetailResponseDTOGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseDetailResponseDTOGeneratorRequestBuilderImpl implements GenericUseCaseDetailResponseDTOGeneratorRequestBuilder
{
    /**
     * @var GenericUseCaseDetailResponseDTOGeneratorRequestDTO
     */
    private $request;

    public function create(): GenericUseCaseDetailResponseDTOGeneratorRequestBuilder
    {
        $this->request = new GenericUseCaseDetailResponseDTOGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): GenericUseCaseDetailResponseDTOGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withFields(array $fields): GenericUseCaseDetailResponseDTOGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }

    public function build(): GenericUseCaseDetailResponseDTOGeneratorRequest
    {
        return $this->request;
    }
}
