<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GetEntityControllerGeneratorRequest extends GeneratorRequest
{
    public function getEntityClassName(): string;
}
