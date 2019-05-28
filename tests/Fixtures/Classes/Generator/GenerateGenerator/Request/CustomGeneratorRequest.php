<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author authorStub <author.stub@example.com>
 */
interface CustomGeneratorRequest extends GeneratorRequest
{
    public function getDefaultValue(): string;
}
