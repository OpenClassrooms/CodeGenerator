<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GenerateGeneratorGeneratorRequest extends GeneratorRequest
{
    public function getConstructionPattern(): string;

    public function getDomain(): string;

    public function getEntity(): string;
}
