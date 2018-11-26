<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseResponseStubGeneratorRequest;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class UseCaseResponseStubGeneratorRequestDTO implements UseCaseResponseStubGeneratorRequest
{
    /**
     * @var string
     */
    public $responseClassName;

    public function getResponseClassName(): string
    {
        return $this->responseClassName;
    }
}
