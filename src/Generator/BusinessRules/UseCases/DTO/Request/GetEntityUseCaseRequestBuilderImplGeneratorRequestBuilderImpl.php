<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseRequestBuilderImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseRequestBuilderImplGeneratorRequestBuilder;

class GetEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl implements GetEntityUseCaseRequestBuilderImplGeneratorRequestBuilder
{
    /**
     * @var GetEntityUseCaseRequestBuilderImplGeneratorRequestDTO
     */
    private $request;

    public function build(): GetEntityUseCaseRequestBuilderImplGeneratorRequest
    {
        return $this->request;
    }

    public function create(): GetEntityUseCaseRequestBuilderImplGeneratorRequestBuilder
    {
        $this->request = new GetEntityUseCaseRequestBuilderImplGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entity): GetEntityUseCaseRequestBuilderImplGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }
}
