<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GetEntityControllerGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetEntityControllerGeneratorRequest;

    public function create(): GetEntityControllerGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): GetEntityControllerGeneratorRequestBuilder;
}
