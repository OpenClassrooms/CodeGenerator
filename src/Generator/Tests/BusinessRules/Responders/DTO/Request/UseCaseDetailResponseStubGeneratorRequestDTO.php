<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseDetailResponseStubGeneratorRequest;

class UseCaseDetailResponseStubGeneratorRequestDTO implements UseCaseDetailResponseStubGeneratorRequest
{
    public string $responseClassName;

    public function getClassName(): string
    {
        return $this->responseClassName;
    }
}
