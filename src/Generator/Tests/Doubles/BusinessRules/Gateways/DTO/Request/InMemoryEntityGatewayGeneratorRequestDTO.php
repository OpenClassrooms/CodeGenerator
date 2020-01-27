<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Gateways\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Gateways\Request\InMemoryEntityGatewayGeneratorRequest;

/**
 * @author arnaud lefevre <arnaud.lefevre@openclassrooms.com>
 */
class InMemoryEntityGatewayGeneratorRequestDTO implements InMemoryEntityGatewayGeneratorRequest
{
    /**
     * @var string
     */
    public $entityClassName;

    public function getEntityClassName(): string
    {
        return $this->entityClassName;
    }
}
