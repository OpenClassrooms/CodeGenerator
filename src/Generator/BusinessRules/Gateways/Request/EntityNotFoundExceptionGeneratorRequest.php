<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface EntityNotFoundExceptionGeneratorRequest extends GeneratorRequest
{
    public function getEnity(): string;
}
