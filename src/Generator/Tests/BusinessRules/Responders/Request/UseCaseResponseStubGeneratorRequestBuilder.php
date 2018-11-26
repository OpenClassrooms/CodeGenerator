<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\tests\BusinessRules\Responders\Request;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
interface UseCaseResponseStubGeneratorRequestBuilder
{
    public function build(): UseCaseResponseStubGeneratorRequest;

    public function create(): UseCaseResponseStubGeneratorRequestBuilder;

    public function withResponseClassName(string $responseClassName): UseCaseResponseStubGeneratorRequestBuilder;
}
