<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\Entity\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface EntityFactoryImplGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): EntityFactoryImplGeneratorRequest;

    public function create(): EntityFactoryImplGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): EntityFactoryImplGeneratorRequestBuilder;
}
