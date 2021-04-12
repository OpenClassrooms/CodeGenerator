<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\Entity\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\App\Entity\Request\EntityFactoryImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\App\Entity\Request\EntityFactoryImplGeneratorRequestBuilder;

class EntityFactoryImplGeneratorRequestBuilderImpl implements EntityFactoryImplGeneratorRequestBuilder
{
    private EntityFactoryImplGeneratorRequestDTO $request;

    public function create(): EntityFactoryImplGeneratorRequestBuilder
    {
        $this->request = new EntityFactoryImplGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): EntityFactoryImplGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): EntityFactoryImplGeneratorRequest
    {
        return $this->request;
    }
}
