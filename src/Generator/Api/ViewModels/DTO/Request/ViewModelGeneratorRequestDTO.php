<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelGeneratorRequest;

class ViewModelGeneratorRequestDTO implements ViewModelGeneratorRequest
{
    public string $className;

    public function getUseCaseResponseClassName(): string
    {
        return $this->className;
    }
}
