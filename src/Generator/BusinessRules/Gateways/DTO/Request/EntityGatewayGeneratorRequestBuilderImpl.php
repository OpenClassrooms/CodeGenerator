<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request\EntityGatewayGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request\EntityGatewayGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class EntityGatewayGeneratorRequestBuilderImpl implements EntityGatewayGeneratorRequestBuilder
{
    /**
     * @var EntityGatewayGeneratorRequestDTO
     */
    private $request;

    public function create(): EntityGatewayGeneratorRequestBuilder
    {
        $this->request = new EntityGatewayGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): EntityGatewayGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    public function build(): EntityGatewayGeneratorRequest
    {
        return $this->request;
    }
}
