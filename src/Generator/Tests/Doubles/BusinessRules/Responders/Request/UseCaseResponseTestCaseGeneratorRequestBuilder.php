<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface UseCaseResponseTestCaseGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): UseCaseResponseTestCaseGeneratorRequest;

    public function create(): UseCaseResponseTestCaseGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entity
    ): UseCaseResponseTestCaseGeneratorRequestBuilder;

    /**
     * @param string[] $fields
     */
    public function withFields(
        array $fields
    ): UseCaseResponseTestCaseGeneratorRequestBuilder;
}
