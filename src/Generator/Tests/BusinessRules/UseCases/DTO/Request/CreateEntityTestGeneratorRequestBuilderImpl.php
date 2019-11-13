<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\CreateEntityTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\CreateEntityTestGeneratorRequestBuilder;

class CreateEntityTestGeneratorRequestBuilderImpl implements CreateEntityTestGeneratorRequestBuilder
{
    /**
     * @var CreateEntityTestGeneratorRequestDTO
     */
    private $request;

    public function create(): CreateEntityTestGeneratorRequestBuilder
    {
        $this->request = new CreateEntityTestGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): CreateEntityTestGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): CreateEntityTestGeneratorRequest
    {
        return $this->request;
    }
}
