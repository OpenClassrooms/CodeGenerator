<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EntityUseCaseCommonRequestTraitGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EntityUseCaseCommonRequestTraitGeneratorRequestBuilder;

class EntityUseCaseCommonRequestTraitGeneratorRequestBuilderImpl implements EntityUseCaseCommonRequestTraitGeneratorRequestBuilder
{
    /**
     * @var EntityUseCaseCommonRequestTraitGeneratorRequestDTO
     */
    private $request;

    public function build(): EntityUseCaseCommonRequestTraitGeneratorRequest
    {
        return $this->request;
    }

    public function create(): EntityUseCaseCommonRequestTraitGeneratorRequestBuilder
    {
        $this->request = new EntityUseCaseCommonRequestTraitGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): EntityUseCaseCommonRequestTraitGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }
}
