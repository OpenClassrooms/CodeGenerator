<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\SelfGenerator\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface SelfGeneratorGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): SelfGeneratorGeneratorRequest;

    public function create(): SelfGeneratorGeneratorRequestBuilder;

    public function withDomain(
        string $domain
    ): SelfGeneratorGeneratorRequestBuilder;

    public function withEntity(
        string $entity
    ): SelfGeneratorGeneratorRequestBuilder;
}
