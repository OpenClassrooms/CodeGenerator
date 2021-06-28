<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseDetailResponseStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseDetailResponseStubGeneratorRequestBuilder;

class UseCaseDetailResponseStubGeneratorRequestBuilderImpl implements UseCaseDetailResponseStubGeneratorRequestBuilder
{
    private UseCaseDetailResponseStubGeneratorRequestDTO $request;

    public function build(): UseCaseDetailResponseStubGeneratorRequest
    {
        return $this->request;
    }

    public function create(): UseCaseDetailResponseStubGeneratorRequestBuilder
    {
        $this->request = new UseCaseDetailResponseStubGeneratorRequestDTO();

        return $this;
    }

    public function withResponseClassName(string $responseClassName): UseCaseDetailResponseStubGeneratorRequestBuilder
    {
        $this->request->responseClassName = $responseClassName;

        return $this;
    }
}
