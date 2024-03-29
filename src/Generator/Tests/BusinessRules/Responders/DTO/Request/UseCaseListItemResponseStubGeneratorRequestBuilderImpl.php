<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseListItemResponseStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseListItemResponseStubGeneratorRequestBuilder;

class UseCaseListItemResponseStubGeneratorRequestBuilderImpl implements UseCaseListItemResponseStubGeneratorRequestBuilder
{
    private UseCaseListItemResponseStubGeneratorRequestDTO $request;

    public function build(): UseCaseListItemResponseStubGeneratorRequest
    {
        return $this->request;
    }

    public function create(): UseCaseListItemResponseStubGeneratorRequestBuilder
    {
        $this->request = new UseCaseListItemResponseStubGeneratorRequestDTO();

        return $this;
    }

    public function withClassName(string $className): UseCaseListItemResponseStubGeneratorRequestBuilder
    {
        $this->request->className = $className;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withFields(array $fields): UseCaseListItemResponseStubGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }
}
