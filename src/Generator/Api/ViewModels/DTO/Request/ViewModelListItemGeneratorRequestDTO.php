<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemGeneratorRequest;

class ViewModelListItemGeneratorRequestDTO implements ViewModelListItemGeneratorRequest
{
    public string $className;

    public function getUseCaseResponseClassName(): string
    {
        return $this->className;
    }
}
