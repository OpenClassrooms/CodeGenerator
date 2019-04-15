<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityGeneratorRequestBuilderImpl implements GetEntityGeneratorRequestBuilder
{
    /**
     * @var GetEntityGeneratorRequestDTO
     */
    private $request;

    public function create(): GetEntityGeneratorRequestBuilder
    {
        $this->request = new GetEntityGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): GetEntityGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    public function build(): GetEntityGeneratorRequest
    {
        return $this->request;
    }
}
