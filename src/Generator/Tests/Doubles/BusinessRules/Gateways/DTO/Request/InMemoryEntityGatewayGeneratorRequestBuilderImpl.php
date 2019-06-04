<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Gateways\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Gateways\Request\InMemoryEntityGatewayGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Gateways\Request\InMemoryEntityGatewayGeneratorRequestBuilder;

/**
 * @author arnaud lefevre <arnaud.lefevre@openclassrooms.com>
 */
class InMemoryEntityGatewayGeneratorRequestBuilderImpl implements InMemoryEntityGatewayGeneratorRequestBuilder
{
    /**
     * @var InMemoryEntityGatewayGeneratorRequestDTO
     */
    private $request;

    public function build(): InMemoryEntityGatewayGeneratorRequest
    {
        return $this->request;
    }

    public function create(): InMemoryEntityGatewayGeneratorRequestBuilder
    {
        $this->request = new InMemoryEntityGatewayGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): InMemoryEntityGatewayGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }
}
