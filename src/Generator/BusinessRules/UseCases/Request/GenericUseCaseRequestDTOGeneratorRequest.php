<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GenericUseCaseRequestDTOGeneratorRequest extends GeneratorRequest
{
    public function getDomain(): string;

    public function getUseCaseName(): string;
}
