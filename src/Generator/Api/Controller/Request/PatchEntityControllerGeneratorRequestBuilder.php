<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface PatchEntityControllerGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): PatchEntityControllerGeneratorRequest;

    public function create(): PatchEntityControllerGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): PatchEntityControllerGeneratorRequestBuilder;
}
