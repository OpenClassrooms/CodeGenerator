<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
interface UseCaseDetailResponseStubGeneratorRequest extends GeneratorRequest
{
    public function getUseCaseDetailResponseClassName(): string;
}
