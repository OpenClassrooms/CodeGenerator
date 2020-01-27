<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface ViewModelDetailAssemblerImplTestGeneratorRequest extends GeneratorRequest
{
    public function getUseCaseResponseClassName(): string;
}
