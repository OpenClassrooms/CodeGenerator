<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GenericUseCaseRequestGeneratorRequest extends GeneratorRequest
{
    public function getDomain(): string;

    public function getUseCaseName(): string;
}
