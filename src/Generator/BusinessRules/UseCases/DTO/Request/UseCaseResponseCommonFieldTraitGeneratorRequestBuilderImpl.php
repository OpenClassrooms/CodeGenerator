<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseCommonFieldTraitGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseCommonFieldTraitGeneratorRequestBuilder;

class UseCaseResponseCommonFieldTraitGeneratorRequestBuilderImpl implements UseCaseResponseCommonFieldTraitGeneratorRequestBuilder
{
    /**
     * @var UseCaseResponseCommonFieldTraitGeneratorRequestDTO
     */
    private $request;

    public function build(): UseCaseResponseCommonFieldTraitGeneratorRequest
    {
        return $this->request;
    }

    public function create(): UseCaseResponseCommonFieldTraitGeneratorRequestBuilder
    {
        $this->request = new UseCaseResponseCommonFieldTraitGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entity): UseCaseResponseCommonFieldTraitGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withFields(array $fields): UseCaseResponseCommonFieldTraitGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }
}
