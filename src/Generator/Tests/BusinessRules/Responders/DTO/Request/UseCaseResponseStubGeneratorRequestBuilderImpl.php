<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\tests\BusinessRules\Responders\Request\UseCaseResponseStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\tests\BusinessRules\Responders\Request\UseCaseResponseStubGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class UseCaseResponseStubGeneratorRequestBuilderImpl implements UseCaseResponseStubGeneratorRequestBuilder
{
    /**
     * @var UseCaseResponseStubGeneratorRequestDTO
     */
    private $request;

    public function build(): UseCaseResponseStubGeneratorRequest
    {
        return $this->request;
    }

    public function create(): UseCaseResponseStubGeneratorRequestBuilder
    {
        $this->request = new UseCaseResponseStubGeneratorRequestDTO();

        return $this;
    }

    public function withResponseClassName(string $responseClassName): UseCaseResponseStubGeneratorRequestBuilder
    {
        $this->request->responseClassName = $responseClassName;

        return $this;
    }
}
