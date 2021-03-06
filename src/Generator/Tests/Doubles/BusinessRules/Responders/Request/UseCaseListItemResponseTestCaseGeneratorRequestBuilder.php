<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface UseCaseListItemResponseTestCaseGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): UseCaseListItemResponseTestCaseGeneratorRequest;

    public function create(): UseCaseListItemResponseTestCaseGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entity
    ): UseCaseListItemResponseTestCaseGeneratorRequestBuilder;

    /**
     * @param string[] $fields
     */
    public function withFields(
        array $fields
    ): UseCaseListItemResponseTestCaseGeneratorRequestBuilder;
}
