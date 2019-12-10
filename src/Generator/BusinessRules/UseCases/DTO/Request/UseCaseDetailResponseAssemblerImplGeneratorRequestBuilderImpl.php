<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseDetailResponseAssemblerImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseDetailResponseAssemblerImplGeneratorRequestBuilder;

class UseCaseDetailResponseAssemblerImplGeneratorRequestBuilderImpl implements UseCaseDetailResponseAssemblerImplGeneratorRequestBuilder
{
    /**
     * @var UseCaseDetailResponseAssemblerImplGeneratorRequestDTO
     */
    private $request;

    public function build(): UseCaseDetailResponseAssemblerImplGeneratorRequest
    {
        return $this->request;
    }

    public function create(): UseCaseDetailResponseAssemblerImplGeneratorRequestBuilder
    {
        $this->request = new UseCaseDetailResponseAssemblerImplGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entity): UseCaseDetailResponseAssemblerImplGeneratorRequestBuilder
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
}
