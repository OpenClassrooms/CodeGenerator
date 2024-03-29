<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelDetailStubGeneratorRequest;

class ViewModelDetailStubGeneratorRequestDTO implements ViewModelDetailStubGeneratorRequest
{
    public string $className;

    public function getUseCaseResponseClassName(): string
    {
        return $this->className;
    }
}
