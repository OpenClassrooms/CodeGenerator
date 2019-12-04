<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseListItemResponseAssemblerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseListItemResponseAssemblerGeneratorRequestBuilder;

class UseCaseListItemResponseAssemblerGeneratorRequestBuilderImpl implements UseCaseListItemResponseAssemblerGeneratorRequestBuilder
{
    /**
     * @var UseCaseListItemResponseAssemblerGeneratorRequestDTO
     */
    private $request;

    public function build(): UseCaseListItemResponseAssemblerGeneratorRequest
    {
        return $this->request;
    }

    public function create(): UseCaseListItemResponseAssemblerGeneratorRequestBuilder
    {
        $this->request = new UseCaseListItemResponseAssemblerGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entity): UseCaseListItemResponseAssemblerGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }
}
