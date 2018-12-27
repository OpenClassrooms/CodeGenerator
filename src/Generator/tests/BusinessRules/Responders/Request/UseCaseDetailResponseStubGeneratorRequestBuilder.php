<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\tests\BusinessRules\Responders\Request;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
interface UseCaseDetailResponseStubGeneratorRequestBuilder
{
    public function build(): UseCaseDetailResponseStubGeneratorRequest;

    public function create(): UseCaseDetailResponseStubGeneratorRequestBuilder;

    public function withResponseClassName(string $responseClassName): UseCaseDetailResponseStubGeneratorRequestBuilder;
}
