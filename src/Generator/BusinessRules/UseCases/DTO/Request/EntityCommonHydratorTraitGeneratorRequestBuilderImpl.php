<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EntityCommonHydratorTraitGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EntityCommonHydratorTraitGeneratorRequestBuilder;

class EntityCommonHydratorTraitGeneratorRequestBuilderImpl implements EntityCommonHydratorTraitGeneratorRequestBuilder
{
    /**
     * @var EntityCommonHydratorTraitGeneratorRequestDTO
     */
    private $request;

    public function create(): EntityCommonHydratorTraitGeneratorRequestBuilder
    {
        $this->request = new EntityCommonHydratorTraitGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): EntityCommonHydratorTraitGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): EntityCommonHydratorTraitGeneratorRequest
    {
        return $this->request;
    }
}
