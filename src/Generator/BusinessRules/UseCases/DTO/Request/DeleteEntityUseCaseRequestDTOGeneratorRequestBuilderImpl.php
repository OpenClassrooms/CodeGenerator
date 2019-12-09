<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\DeleteEntityUseCaseRequestDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\DeleteEntityUseCaseRequestDTOGeneratorRequestBuilder;

class DeleteEntityUseCaseRequestDTOGeneratorRequestBuilderImpl implements DeleteEntityUseCaseRequestDTOGeneratorRequestBuilder
{
    /**
     * @var DeleteEntityUseCaseRequestDTOGeneratorRequestDTO
     */
    private $request;

    public function build(): DeleteEntityUseCaseRequestDTOGeneratorRequest
    {
        return $this->request;
    }

    public function create(): DeleteEntityUseCaseRequestDTOGeneratorRequestBuilder
    {
        $this->request = new DeleteEntityUseCaseRequestDTOGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): DeleteEntityUseCaseRequestDTOGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }
}
