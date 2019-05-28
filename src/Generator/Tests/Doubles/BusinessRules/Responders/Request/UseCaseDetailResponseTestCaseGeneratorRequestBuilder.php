<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface UseCaseDetailResponseTestCaseGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): UseCaseDetailResponseTestCaseGeneratorRequest;

    public function create(): UseCaseDetailResponseTestCaseGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): UseCaseDetailResponseTestCaseGeneratorRequestBuilder;

    /**
     * @param string[] $fields
     */
    public function withFields(
        array $fields
    ): UseCaseDetailResponseTestCaseGeneratorRequestBuilder;
}
