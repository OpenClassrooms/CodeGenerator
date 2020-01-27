<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface UseCaseDetailResponseAssemblerMockGeneratorRequest extends GeneratorRequest
{
    public function getEntityClassName(): string;
}
