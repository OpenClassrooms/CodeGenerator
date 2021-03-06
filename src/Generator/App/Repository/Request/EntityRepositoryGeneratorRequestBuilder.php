<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\Repository\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface EntityRepositoryGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): EntityRepositoryGeneratorRequest;

    public function create(): EntityRepositoryGeneratorRequestBuilder;

    public function withEntityClassName(string $entity): EntityRepositoryGeneratorRequestBuilder;
}
