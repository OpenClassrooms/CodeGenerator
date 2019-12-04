<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request;

interface UseCaseDetailResponseStubGeneratorRequestBuilder
{
    public function build(): UseCaseDetailResponseStubGeneratorRequest;

    public function create(): UseCaseDetailResponseStubGeneratorRequestBuilder;

    public function withResponseClassName(string $responseClassName): UseCaseDetailResponseStubGeneratorRequestBuilder;
}
