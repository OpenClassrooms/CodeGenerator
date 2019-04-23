<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\GenericUseCaseDetailResponseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\GenericUseCaseDetailResponseGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseDetailResponseGeneratorRequestBuilderImpl implements GenericUseCaseDetailResponseGeneratorRequestBuilder
{
    /**
     * @var GenericUseCaseDetailResponseGeneratorRequestDTO
     */
    private $request;

    public function create(): GenericUseCaseDetailResponseGeneratorRequestBuilder
    {
        $this->request = new GenericUseCaseDetailResponseGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): GenericUseCaseDetailResponseGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withFields(array $fields): GenericUseCaseDetailResponseGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }

    public function build(): GenericUseCaseDetailResponseGeneratorRequest
    {
        return $this->request;
    }
}
