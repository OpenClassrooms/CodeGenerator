<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseDetailResponseAssemblerImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseDetailResponseAssemblerImplGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseDetailResponseAssemblerImplGeneratorRequestBuilderImpl implements UseCaseDetailResponseAssemblerImplGeneratorRequestBuilder
{
    /**
     * @var UseCaseDetailResponseAssemblerImplGeneratorRequestDTO
     */
    private $request;

    public function create(): UseCaseDetailResponseAssemblerImplGeneratorRequestBuilder
    {
        $this->request = new UseCaseDetailResponseAssemblerImplGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): UseCaseDetailResponseAssemblerImplGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withFields(array $fields): UseCaseDetailResponseAssemblerImplGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }

    public function build(): UseCaseDetailResponseAssemblerImplGeneratorRequest
    {
        return $this->request;
    }
}
