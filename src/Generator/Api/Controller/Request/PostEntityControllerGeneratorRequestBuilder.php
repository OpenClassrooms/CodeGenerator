<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface PostEntityControllerGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): PostEntityControllerGeneratorRequest;

    public function create(): PostEntityControllerGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): PostEntityControllerGeneratorRequestBuilder;
}
