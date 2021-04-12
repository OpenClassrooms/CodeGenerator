<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\Repository\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\App\Repository\Request\EntityRepositoryGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\App\Repository\Request\EntityRepositoryGeneratorRequestBuilder;

class EntityRepositoryGeneratorRequestBuilderImpl implements EntityRepositoryGeneratorRequestBuilder
{
    private EntityRepositoryGeneratorRequestDTO $request;

    public function build(): EntityRepositoryGeneratorRequest
    {
        return $this->request;
    }

    public function create(): EntityRepositoryGeneratorRequestBuilder
    {
        $this->request = new EntityRepositoryGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entity): EntityRepositoryGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }
}
