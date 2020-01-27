<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface DeleteEntityControllerGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): DeleteEntityControllerGeneratorRequest;

    public function create(): DeleteEntityControllerGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): DeleteEntityControllerGeneratorRequestBuilder;
}
