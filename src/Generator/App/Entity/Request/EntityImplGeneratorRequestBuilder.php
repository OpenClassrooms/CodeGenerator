<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\Entity\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface EntityImplGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): EntityImplGeneratorRequest;

    public function create(): EntityImplGeneratorRequestBuilder;

    public function withClassName(string $className): EntityImplGeneratorRequestBuilder;
}
