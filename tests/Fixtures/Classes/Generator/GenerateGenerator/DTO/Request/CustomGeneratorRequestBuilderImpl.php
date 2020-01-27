<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\Request\CustomGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\Request\CustomGeneratorRequestBuilder;

class CustomGeneratorRequestBuilderImpl implements CustomGeneratorRequestBuilder
{
    /**
     * @var CustomGeneratorRequestDTO
     */
    private $request;

    public function create(): CustomGeneratorRequestBuilder
    {
        $this->request = new CustomGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): CustomGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): CustomGeneratorRequest
    {
        return $this->request;
    }
}
