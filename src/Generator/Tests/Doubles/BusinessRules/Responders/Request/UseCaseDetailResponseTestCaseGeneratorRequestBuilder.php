<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface UseCaseDetailResponseTestCaseGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): UseCaseDetailResponseTestCaseGeneratorRequest;

    public function create(): UseCaseDetailResponseTestCaseGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entity
    ): UseCaseDetailResponseTestCaseGeneratorRequestBuilder;

    /**
     * @param string[] $fields
     */
    public function withFields(
        array $fields
    ): UseCaseDetailResponseTestCaseGeneratorRequestBuilder;
}
