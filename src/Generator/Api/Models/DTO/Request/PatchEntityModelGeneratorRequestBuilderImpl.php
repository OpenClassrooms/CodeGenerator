<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Models\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\Models\Request\PatchEntityModelGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\Request\PatchEntityModelGeneratorRequestBuilder;

class PatchEntityModelGeneratorRequestBuilderImpl implements PatchEntityModelGeneratorRequestBuilder
{
    /**
     * @var PatchEntityModelGeneratorRequestDTO
     */
    private $request;

    public function create(): PatchEntityModelGeneratorRequestBuilder
    {
        $this->request = new PatchEntityModelGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): PatchEntityModelGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): PatchEntityModelGeneratorRequest
    {
        return $this->request;
    }
}
