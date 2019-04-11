<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GenerateGeneratorGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GenerateGeneratorGeneratorRequest;

    public function create(): GenerateGeneratorGeneratorRequestBuilder;

    public function withDomain(
        string $domain
    ): GenerateGeneratorGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): GenerateGeneratorGeneratorRequestBuilder;
}
