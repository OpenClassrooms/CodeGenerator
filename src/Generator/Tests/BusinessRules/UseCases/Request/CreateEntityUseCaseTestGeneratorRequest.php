<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface CreateEntityUseCaseTestGeneratorRequest extends GeneratorRequest
{
    public function getEntityClassName(): string;
}
