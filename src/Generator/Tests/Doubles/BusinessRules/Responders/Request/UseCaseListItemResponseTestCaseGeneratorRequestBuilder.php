<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface UseCaseListItemResponseTestCaseGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): UseCaseListItemResponseTestCaseGeneratorRequest;

    public function create(): UseCaseListItemResponseTestCaseGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): UseCaseListItemResponseTestCaseGeneratorRequestBuilder;

    /**
     * @param string[] $fields
     */
    public function withFields(
        array $fields
    ): UseCaseListItemResponseTestCaseGeneratorRequestBuilder;
}
