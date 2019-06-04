<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntityUseCaseRequestBuilderGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntityUseCaseRequestBuilderGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl implements GetEntityUseCaseRequestBuilderGeneratorRequestBuilder
{
    /**
     * @var GetEntityUseCaseRequestBuilderGeneratorRequestDTO
     */
    private $request;

    public function create(): GetEntityUseCaseRequestBuilderGeneratorRequestBuilder
    {
        $this->request = new GetEntityUseCaseRequestBuilderGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entity): GetEntityUseCaseRequestBuilderGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    public function build(): GetEntityUseCaseRequestBuilderGeneratorRequest
    {
        return $this->request;
    }
}
