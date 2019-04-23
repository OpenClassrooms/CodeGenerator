<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseDetailResponseAssemblerImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseDetailResponseAssemblerImplGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseDetailResponseAssemblerImplGeneratorRequestBuilderImpl implements GenericUseCaseDetailResponseAssemblerImplGeneratorRequestBuilder
{
    /**
     * @var GenericUseCaseDetailResponseAssemblerImplGeneratorRequestDTO
     */
    private $request;

    public function create(): GenericUseCaseDetailResponseAssemblerImplGeneratorRequestBuilder
    {
        $this->request = new GenericUseCaseDetailResponseAssemblerImplGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): GenericUseCaseDetailResponseAssemblerImplGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withFields(array $fields): GenericUseCaseDetailResponseAssemblerImplGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }

    public function build(): GenericUseCaseDetailResponseAssemblerImplGeneratorRequest
    {
        return $this->request;
    }
}
