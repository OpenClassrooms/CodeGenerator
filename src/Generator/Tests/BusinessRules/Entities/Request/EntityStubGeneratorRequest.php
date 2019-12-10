<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface EntityStubGeneratorRequest extends GeneratorRequest
{
    public function getUseCaseResponseClassName(): string;
}
