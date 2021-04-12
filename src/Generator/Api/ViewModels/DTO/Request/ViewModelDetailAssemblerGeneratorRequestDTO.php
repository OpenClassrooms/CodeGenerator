<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailAssemblerGeneratorRequest;

class ViewModelDetailAssemblerGeneratorRequestDTO implements ViewModelDetailAssemblerGeneratorRequest
{
    public string $className;

    public function getUseCaseResponseClassName(): string
    {
        return $this->className;
    }
}
