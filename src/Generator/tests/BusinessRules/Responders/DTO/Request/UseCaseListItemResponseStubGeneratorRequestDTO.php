<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseListItemResponseStubGeneratorRequest;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class UseCaseListItemResponseStubGeneratorRequestDTO implements UseCaseListItemResponseStubGeneratorRequest
{
    /**
     * @var string
     */
    public $responseClassName;

    public function getUseCaseListItemResponseClassName(): string
    {
        return $this->responseClassName;
    }
}
