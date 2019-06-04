<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Gateways\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author arnaud lefevre <arnaud.lefevre@openclassrooms.com>
 */
interface InMemoryEntityGatewayGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): InMemoryEntityGatewayGeneratorRequest;

    public function create(): InMemoryEntityGatewayGeneratorRequestBuilder;

    public function withEntityClassName(string $entityClassName): InMemoryEntityGatewayGeneratorRequestBuilder;
}
