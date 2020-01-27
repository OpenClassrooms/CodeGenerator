<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseResponseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseResponseGeneratorRequestBuilder;

class UseCaseResponseGeneratorRequestBuilderImpl implements UseCaseResponseGeneratorRequestBuilder
{
    /**
     * @var UseCaseResponseGeneratorRequestDTO
     */
    private $request;

    public function build(): UseCaseResponseGeneratorRequest
    {
        return $this->request;
    }

    public function create(): UseCaseResponseGeneratorRequestBuilder
    {
        $this->request = new UseCaseResponseGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entity): UseCaseResponseGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withFields(array $fields): UseCaseResponseGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }
}
