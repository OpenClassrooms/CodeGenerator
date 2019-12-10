<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface EntityGatewayGeneratorRequest extends GeneratorRequest
{
    public function getEntityClassName(): string;
}
