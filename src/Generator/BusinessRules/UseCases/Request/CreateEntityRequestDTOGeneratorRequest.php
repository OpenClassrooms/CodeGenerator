<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface CreateEntityRequestDTOGeneratorRequest extends GeneratorRequest
{
    public function getEntityClassName(): string;
}