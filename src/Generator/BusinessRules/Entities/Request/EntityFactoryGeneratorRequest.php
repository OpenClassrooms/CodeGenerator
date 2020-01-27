<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Entities\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface EntityFactoryGeneratorRequest extends GeneratorRequest
{
    public function getEntityClassName(): string;
}
