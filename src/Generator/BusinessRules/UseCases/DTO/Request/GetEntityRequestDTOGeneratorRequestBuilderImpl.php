<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityRequestDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityRequestDTOGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityRequestDTOGeneratorRequestBuilderImpl implements GetEntityRequestDTOGeneratorRequestBuilder
{
    /**
     * @var GetEntityRequestDTOGeneratorRequestDTO
     */
    private $request;

    public function create(): GetEntityRequestDTOGeneratorRequestBuilder
    {
        $this->request = new GetEntityRequestDTOGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): GetEntityRequestDTOGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    public function build(): GetEntityRequestDTOGeneratorRequest
    {
        return $this->request;
    }
}
