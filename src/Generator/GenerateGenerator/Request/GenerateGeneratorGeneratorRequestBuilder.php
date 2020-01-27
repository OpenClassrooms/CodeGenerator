<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GenerateGeneratorGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GenerateGeneratorGeneratorRequest;

    public function create(): GenerateGeneratorGeneratorRequestBuilder;

    public function withConstructionPattern(
        string $constructionPattern
    ): GenerateGeneratorGeneratorRequestBuilder;

    public function withDomain(
        string $domain
    ): GenerateGeneratorGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entity
    ): GenerateGeneratorGeneratorRequestBuilder;
}
