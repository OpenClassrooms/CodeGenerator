<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseDetailResponseAssemblerMockGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseDetailResponseAssemblerMockGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseDetailResponseAssemblerMockGeneratorRequestBuilderImpl implements UseCaseDetailResponseAssemblerMockGeneratorRequestBuilder
{
    /**
     * @var UseCaseDetailResponseAssemblerMockGeneratorRequestDTO
     */
    private $request;

    public function create(): UseCaseDetailResponseAssemblerMockGeneratorRequestBuilder
    {
        $this->request = new UseCaseDetailResponseAssemblerMockGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): UseCaseDetailResponseAssemblerMockGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    public function build(): UseCaseDetailResponseAssemblerMockGeneratorRequest
    {
        return $this->request;
    }
}
