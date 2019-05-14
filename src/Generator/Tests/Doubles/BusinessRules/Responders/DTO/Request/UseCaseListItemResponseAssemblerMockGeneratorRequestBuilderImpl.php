<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseListItemResponseAssemblerMockGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseListItemResponseAssemblerMockGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseListItemResponseAssemblerMockGeneratorRequestBuilderImpl implements UseCaseListItemResponseAssemblerMockGeneratorRequestBuilder
{
    /**
     * @var UseCaseListItemResponseAssemblerMockGeneratorRequestDTO
     */
    private $request;

    public function create(): UseCaseListItemResponseAssemblerMockGeneratorRequestBuilder
    {
        $this->request = new UseCaseListItemResponseAssemblerMockGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): UseCaseListItemResponseAssemblerMockGeneratorRequestBuilder
    {
        $this->request->defaultValue = $entity;

        return $this;
    }

    public function build(): UseCaseListItemResponseAssemblerMockGeneratorRequest
    {
        return $this->request;
    }
}
