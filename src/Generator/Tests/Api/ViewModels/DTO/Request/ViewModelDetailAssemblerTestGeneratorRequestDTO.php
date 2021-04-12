<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelDetailAssemblerTestGeneratorRequest;

class ViewModelDetailAssemblerTestGeneratorRequestDTO implements ViewModelDetailAssemblerTestGeneratorRequest
{
    public string $responseClassName;

    public function getUseCaseResponseClassName(): string
    {
        return $this->responseClassName;
    }
}
