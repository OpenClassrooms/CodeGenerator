<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface CreateEntityRequestGeneratorRequest extends GeneratorRequest
{
    public function getEntityClassName(): string;

    public function getFields(): array;
}
