<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\tests\BusinessRules\Responders\Request;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface UseCaseListItemResponseStubGeneratorRequestBuilder
{
    public function build(): UseCaseListItemResponseStubGeneratorRequest;

    public function create(): UseCaseListItemResponseStubGeneratorRequestBuilder;

    public function withResponseClassName(string $responseClassName): UseCaseListItemResponseStubGeneratorRequestBuilder;
}
