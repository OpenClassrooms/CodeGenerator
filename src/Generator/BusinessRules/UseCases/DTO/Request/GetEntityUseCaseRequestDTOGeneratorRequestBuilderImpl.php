<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseRequestDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseRequestDTOGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityUseCaseRequestDTOGeneratorRequestBuilderImpl implements GetEntityUseCaseRequestDTOGeneratorRequestBuilder
{
    /**
     * @var GetEntityUseCaseRequestDTOGeneratorRequestDTO
     */
    private $request;

    public function create(): GetEntityUseCaseRequestDTOGeneratorRequestBuilder
    {
        $this->request = new GetEntityUseCaseRequestDTOGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entity): GetEntityUseCaseRequestDTOGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    public function build(): GetEntityUseCaseRequestDTOGeneratorRequest
    {
        return $this->request;
    }
}
