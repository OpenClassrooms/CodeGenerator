<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseListItemResponseAssemblerMockGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseListItemResponseAssemblerMockGeneratorRequestBuilder;

class UseCaseListItemResponseAssemblerMockGeneratorRequestBuilderImpl implements UseCaseListItemResponseAssemblerMockGeneratorRequestBuilder
{
    /**
     * @var UseCaseListItemResponseAssemblerMockGeneratorRequestDTO
     */
    private $request;

    public function build(): UseCaseListItemResponseAssemblerMockGeneratorRequest
    {
        return $this->request;
    }

    public function create(): UseCaseListItemResponseAssemblerMockGeneratorRequestBuilder
    {
        $this->request = new UseCaseListItemResponseAssemblerMockGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(
        string $entityClassName
    ): UseCaseListItemResponseAssemblerMockGeneratorRequestBuilder {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }
}
