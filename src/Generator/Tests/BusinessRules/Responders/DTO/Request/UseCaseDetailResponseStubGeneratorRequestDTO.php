<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseDetailResponseStubGeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseDetailResponseStubGeneratorRequestDTO implements UseCaseDetailResponseStubGeneratorRequest
{
    /**
     * @var string
     */
    public $responseClassName;

    public function getClassName(): string
    {
        return $this->responseClassName;
    }
}
