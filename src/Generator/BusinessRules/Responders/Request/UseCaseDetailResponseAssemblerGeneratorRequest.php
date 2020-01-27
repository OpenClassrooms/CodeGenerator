<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface UseCaseDetailResponseAssemblerGeneratorRequest extends GeneratorRequest
{
    public function getEntityClassName(): string;
}
