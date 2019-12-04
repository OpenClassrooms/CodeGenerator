<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface UseCaseResponseTestCaseGeneratorRequest extends GeneratorRequest
{
    public function getEntityClassName(): string;

    /**
     * @return string[]
     */
    public function getFields(): array;
}
