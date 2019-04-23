<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\GenericUseCaseResponseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\GenericUseCaseResponseGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseResponseGeneratorRequestBuilderImpl implements GenericUseCaseResponseGeneratorRequestBuilder
{
    /**
     * @var GenericUseCaseResponseGeneratorRequestDTO
     */
    private $request;

    public function create(): GenericUseCaseResponseGeneratorRequestBuilder
    {
        $this->request = new GenericUseCaseResponseGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): GenericUseCaseResponseGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withFields(array $fields): GenericUseCaseResponseGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }

    public function build(): GenericUseCaseResponseGeneratorRequest
    {
        return $this->request;
    }
}
