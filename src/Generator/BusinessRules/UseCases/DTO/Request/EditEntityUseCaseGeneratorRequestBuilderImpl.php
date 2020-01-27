<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EditEntityUseCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EditEntityUseCaseGeneratorRequestBuilder;

class EditEntityUseCaseGeneratorRequestBuilderImpl implements EditEntityUseCaseGeneratorRequestBuilder
{
    /**
     * @var EditEntityUseCaseGeneratorRequestDTO
     */
    private $request;

    public function build(): EditEntityUseCaseGeneratorRequest
    {
        return $this->request;
    }

    public function create(): EditEntityUseCaseGeneratorRequestBuilder
    {
        $this->request = new EditEntityUseCaseGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): EditEntityUseCaseGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }
}
