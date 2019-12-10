<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface ViewModelListItemStubGeneratorRequest extends GeneratorRequest
{
    public function getUseCaseResponseClassName(): string;
}
