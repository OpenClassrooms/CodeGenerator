<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\DeleteEntityUseCaseTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\DeleteEntityUseCaseTestGeneratorRequestBuilder;

class DeleteEntityUseCaseTestGeneratorRequestBuilderImpl implements DeleteEntityUseCaseTestGeneratorRequestBuilder
{
    /**
     * @var DeleteEntityUseCaseTestGeneratorRequestDTO
     */
    private $request;

    public function create(): DeleteEntityUseCaseTestGeneratorRequestBuilder
    {
        $this->request = new DeleteEntityUseCaseTestGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): DeleteEntityUseCaseTestGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): DeleteEntityUseCaseTestGeneratorRequest
    {
        return $this->request;
    }
}
