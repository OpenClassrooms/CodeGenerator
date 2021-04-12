<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseResponseTestCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseResponseTestCaseGeneratorRequestBuilder;

class UseCaseResponseTestCaseGeneratorRequestBuilderImpl implements UseCaseResponseTestCaseGeneratorRequestBuilder
{
    private UseCaseResponseTestCaseGeneratorRequestDTO $request;

    public function build(): UseCaseResponseTestCaseGeneratorRequest
    {
        return $this->request;
    }

    public function create(): UseCaseResponseTestCaseGeneratorRequestBuilder
    {
        $this->request = new UseCaseResponseTestCaseGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entity): UseCaseResponseTestCaseGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    public function withFields(array $fields): UseCaseResponseTestCaseGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }
}
