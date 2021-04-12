<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Models\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\Models\Request\PostEntityModelGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\Request\PostEntityModelGeneratorRequestBuilder;

class PostEntityModelGeneratorRequestBuilderImpl implements PostEntityModelGeneratorRequestBuilder
{
    private PostEntityModelGeneratorRequestDTO $request;

    public function create(): PostEntityModelGeneratorRequestBuilder
    {
        $this->request = new PostEntityModelGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): PostEntityModelGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): PostEntityModelGeneratorRequest
    {
        return $this->request;
    }
}
