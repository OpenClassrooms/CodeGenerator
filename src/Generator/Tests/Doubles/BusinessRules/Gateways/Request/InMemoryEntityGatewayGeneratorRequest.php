<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Gateways\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author arnaud lefevre <arnaud.lefevre@openclassrooms.com>
 */
interface InMemoryEntityGatewayGeneratorRequest extends GeneratorRequest
{
    public function getEntityClassName(): string;
}
