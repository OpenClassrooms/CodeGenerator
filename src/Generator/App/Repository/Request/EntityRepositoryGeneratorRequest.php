<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\Repository\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface EntityRepositoryGeneratorRequest extends GeneratorRequest
{
    public function getEntityClassName(): string;
}
