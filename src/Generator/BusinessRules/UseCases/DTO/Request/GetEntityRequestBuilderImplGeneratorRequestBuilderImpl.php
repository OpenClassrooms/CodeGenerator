<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityRequestBuilderImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityRequestBuilderImplGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityRequestBuilderImplGeneratorRequestBuilderImpl implements GetEntityRequestBuilderImplGeneratorRequestBuilder
{
    /**
     * @var GetEntityRequestBuilderImplGeneratorRequestDTO
     */
    private $request;

    public function create(): GetEntityRequestBuilderImplGeneratorRequestBuilder
    {
        $this->request = new GetEntityRequestBuilderImplGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): GetEntityRequestBuilderImplGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    public function build(): GetEntityRequestBuilderImplGeneratorRequest
    {
        return $this->request;
    }
}
