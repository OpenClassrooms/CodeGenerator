<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface UseCaseDetailResponseGeneratorRequest extends GeneratorRequest
{
    public function getEntity(): string;

    /**
     * @return string[]
     */
    public function getFields(): array;
}
