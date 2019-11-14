<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface CreateEntityUseCaseRequestGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): CreateEntityUseCaseRequestGeneratorRequest;

    public function create(): CreateEntityUseCaseRequestGeneratorRequestBuilder;

    public function withEntityClassName(string $entityClassName): CreateEntityUseCaseRequestGeneratorRequestBuilder;
}
