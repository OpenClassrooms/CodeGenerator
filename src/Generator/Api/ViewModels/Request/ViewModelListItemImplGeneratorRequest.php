<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface ViewModelListItemImplGeneratorRequest extends GeneratorRequest
{
    public function getUseCaseResponseClassName(): string;
}
