<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelListItemAssemblerImplTestGeneratorRequest;

class ViewModelListItemAssemblerImplTestGeneratorRequestDTO implements ViewModelListItemAssemblerImplTestGeneratorRequest
{
    public string $responseClassName;

    public function getUseCaseResponseClassName(): string
    {
        return $this->responseClassName;
    }
}
