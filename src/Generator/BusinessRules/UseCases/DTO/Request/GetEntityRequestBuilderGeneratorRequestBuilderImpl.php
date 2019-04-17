<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityRequestBuilderGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityRequestBuilderGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityRequestBuilderGeneratorRequestBuilderImpl implements GetEntityRequestBuilderGeneratorRequestBuilder
{
    /**
     * @var GetEntityRequestBuilderGeneratorRequestDTO
     */
    private $request;

    public function create(): GetEntityRequestBuilderGeneratorRequestBuilder
    {
        $this->request = new GetEntityRequestBuilderGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): GetEntityRequestBuilderGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    public function build(): GetEntityRequestBuilderGeneratorRequest
    {
        return $this->request;
    }
}
