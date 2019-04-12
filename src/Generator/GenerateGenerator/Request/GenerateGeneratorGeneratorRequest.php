<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GenerateGeneratorGeneratorRequest extends GeneratorRequest
{
    public function getDomain(): string;

    public function getEntity(): string;

    public function getConstructionPattern(): string;
}
