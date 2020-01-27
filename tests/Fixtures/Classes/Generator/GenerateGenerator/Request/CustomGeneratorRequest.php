<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface CustomGeneratorRequest extends GeneratorRequest
{
    public function getEntityClassName(): string;
}
