<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\Entity\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface EntityFactoryImplGeneratorRequest extends GeneratorRequest
{
    public function getEntityClassName(): string;
}
