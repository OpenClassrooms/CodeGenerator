<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface UseCaseListItemResponseAssemblerImplGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): UseCaseListItemResponseAssemblerImplGeneratorRequest;

    public function create(): UseCaseListItemResponseAssemblerImplGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entity
    ): UseCaseListItemResponseAssemblerImplGeneratorRequestBuilder;

    /**
     * @param string[] $fields
     */
    public function withFields(array $fields): UseCaseListItemResponseAssemblerImplGeneratorRequestBuilder;
}
