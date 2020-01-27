<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface EntityGatewayGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): EntityGatewayGeneratorRequest;

    public function create(): EntityGatewayGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entity
    ): EntityGatewayGeneratorRequestBuilder;
}
