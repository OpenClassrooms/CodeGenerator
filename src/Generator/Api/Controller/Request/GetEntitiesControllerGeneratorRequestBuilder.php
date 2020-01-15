<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GetEntitiesControllerGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GetEntitiesControllerGeneratorRequest;

    public function create(): GetEntitiesControllerGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entityClassName
    ): GetEntitiesControllerGeneratorRequestBuilder;
}
