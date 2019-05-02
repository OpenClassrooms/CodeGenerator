<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseRequestGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityUseCaseRequestGeneratorRequestBuilderImpl implements GetEntityUseCaseRequestGeneratorRequestBuilder
{
    /**
     * @var GetEntityUseCaseRequestGeneratorRequestDTO
     */
    private $request;

    public function create(): GetEntityUseCaseRequestGeneratorRequestBuilder
    {
        $this->request = new GetEntityUseCaseRequestGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): GetEntityUseCaseRequestGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    public function build(): GetEntityUseCaseRequestGeneratorRequest
    {
        return $this->request;
    }
}
