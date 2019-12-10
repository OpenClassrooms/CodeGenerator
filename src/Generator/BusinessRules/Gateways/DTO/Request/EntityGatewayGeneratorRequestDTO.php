<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request\EntityGatewayGeneratorRequest;

class EntityGatewayGeneratorRequestDTO implements EntityGatewayGeneratorRequest
{
    /**
     * @var string
     */
    public $entity;

    public function getEntityClassName(): string
    {
        return $this->entity;
    }
}
