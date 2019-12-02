<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EntityUseCaseCommonRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EntityUseCaseCommonRequestGeneratorRequestBuilder;

class EntityUseCaseCommonRequestGeneratorRequestBuilderImpl implements EntityUseCaseCommonRequestGeneratorRequestBuilder
{
    /**
     * @var EntityUseCaseCommonRequestGeneratorRequestDTO
     */
    private $request;

    public function build(): EntityUseCaseCommonRequestGeneratorRequest
    {
        return $this->request;
    }

    public function create(): EntityUseCaseCommonRequestGeneratorRequestBuilder
    {
        $this->request = new EntityUseCaseCommonRequestGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): EntityUseCaseCommonRequestGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }
}
