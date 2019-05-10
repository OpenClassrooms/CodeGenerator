<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface EntityGatewayGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): EntityGatewayGeneratorRequest;

    public function create(): EntityGatewayGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): EntityGatewayGeneratorRequestBuilder;
}