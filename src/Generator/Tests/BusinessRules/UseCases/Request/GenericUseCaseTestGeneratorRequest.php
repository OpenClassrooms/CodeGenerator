<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GenericUseCaseTestGeneratorRequest extends GeneratorRequest
{
    public function getDomain(): string;

    public function getUseCaseName(): string;
}
