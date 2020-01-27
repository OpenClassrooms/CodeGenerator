<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseDetailResponseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseDetailResponseGeneratorRequestBuilder;

class UseCaseDetailResponseGeneratorRequestBuilderImpl implements UseCaseDetailResponseGeneratorRequestBuilder
{
    /**
     * @var UseCaseDetailResponseGeneratorRequestDTO
     */
    private $request;

    public function build(): UseCaseDetailResponseGeneratorRequest
    {
        return $this->request;
    }

    public function create(): UseCaseDetailResponseGeneratorRequestBuilder
    {
        $this->request = new UseCaseDetailResponseGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entity): UseCaseDetailResponseGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withFields(array $fields): UseCaseDetailResponseGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }
}
