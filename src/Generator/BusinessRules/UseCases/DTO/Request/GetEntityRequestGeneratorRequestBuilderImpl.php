<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityRequestGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityRequestGeneratorRequestBuilderImpl implements GetEntityRequestGeneratorRequestBuilder
{
    /**
     * @var GetEntityRequestGeneratorRequestDTO
     */
    private $request;

    public function create(): GetEntityRequestGeneratorRequestBuilder
    {
        $this->request = new GetEntityRequestGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): GetEntityRequestGeneratorRequestBuilder
    {
        $this->request->defaultValue = $entity;

        return $this;
    }

    public function build(): GetEntityRequestGeneratorRequest
    {
        return $this->request;
    }
}
