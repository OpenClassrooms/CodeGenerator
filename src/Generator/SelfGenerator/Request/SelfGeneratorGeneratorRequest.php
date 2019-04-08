<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\SelfGenerator\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface SelfGeneratorGeneratorRequest extends GeneratorRequest
{
    public function getDomain(): string;

    public function getEntity(): string;
}
