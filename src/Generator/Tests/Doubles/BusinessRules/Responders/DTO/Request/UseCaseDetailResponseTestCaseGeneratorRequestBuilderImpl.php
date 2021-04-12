<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseDetailResponseTestCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseDetailResponseTestCaseGeneratorRequestBuilder;

class UseCaseDetailResponseTestCaseGeneratorRequestBuilderImpl implements UseCaseDetailResponseTestCaseGeneratorRequestBuilder
{
    private UseCaseDetailResponseTestCaseGeneratorRequestDTO $request;

    public function build(): UseCaseDetailResponseTestCaseGeneratorRequest
    {
        return $this->request;
    }

    public function create(): UseCaseDetailResponseTestCaseGeneratorRequestBuilder
    {
        $this->request = new UseCaseDetailResponseTestCaseGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entity): UseCaseDetailResponseTestCaseGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withFields(array $fields): UseCaseDetailResponseTestCaseGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }
}
