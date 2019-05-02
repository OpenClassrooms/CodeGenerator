<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseDetailResponseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseDetailResponseGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseDetailResponseGeneratorRequestBuilderImpl implements UseCaseDetailResponseGeneratorRequestBuilder
{
    /**
     * @var UseCaseDetailResponseGeneratorRequestDTO
     */
    private $request;

    public function create(): UseCaseDetailResponseGeneratorRequestBuilder
    {
        $this->request = new UseCaseDetailResponseGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): UseCaseDetailResponseGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withFields(array $fields): UseCaseDetailResponseGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }

    public function build(): UseCaseDetailResponseGeneratorRequest
    {
        return $this->request;
    }
}
