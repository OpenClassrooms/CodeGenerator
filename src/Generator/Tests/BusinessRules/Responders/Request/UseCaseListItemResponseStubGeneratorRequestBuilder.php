<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request;

interface UseCaseListItemResponseStubGeneratorRequestBuilder
{
    public function build(): UseCaseListItemResponseStubGeneratorRequest;

    public function create(): UseCaseListItemResponseStubGeneratorRequestBuilder;

    public function withClassName(string $responseClassName): UseCaseListItemResponseStubGeneratorRequestBuilder;

    /**
     * @param string[]
     */
    public function withFields(array $fields): UseCaseListItemResponseStubGeneratorRequestBuilder;
}
