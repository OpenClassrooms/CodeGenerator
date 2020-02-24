<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Models\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\Models\Request\PutEntityModelGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\Request\PutEntityModelGeneratorRequestBuilder;

class PutEntityModelGeneratorRequestBuilderImpl implements PutEntityModelGeneratorRequestBuilder
{
    /**
     * @var PutEntityModelGeneratorRequestDTO
     */
    private $request;

    public function create(): PutEntityModelGeneratorRequestBuilder
    {
        $this->request = new PutEntityModelGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): PutEntityModelGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): PutEntityModelGeneratorRequest
    {
        return $this->request;
    }
}
