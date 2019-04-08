<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseListItemResponseStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseListItemResponseStubGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseListItemResponseStubGeneratorRequestBuilderImpl implements UseCaseListItemResponseStubGeneratorRequestBuilder
{
    /**
     * @var UseCaseListItemResponseStubGeneratorRequestDTO
     */
    private $request;

    public function build(): UseCaseListItemResponseStubGeneratorRequest
    {
        return $this->request;
    }

    public function create(): UseCaseListItemResponseStubGeneratorRequestBuilder
    {
        $this->request = new UseCaseListItemResponseStubGeneratorRequestDTO();

        return $this;
    }

    public function withResponseClassName(string $responseClassName): UseCaseListItemResponseStubGeneratorRequestBuilder
    {
        $this->request->responseClassName = $responseClassName;

        return $this;
    }
}
