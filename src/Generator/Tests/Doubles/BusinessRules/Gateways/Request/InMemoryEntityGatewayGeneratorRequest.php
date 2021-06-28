<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Gateways\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface InMemoryEntityGatewayGeneratorRequest extends GeneratorRequest
{
    public function getEntityClassName(): string;
}
