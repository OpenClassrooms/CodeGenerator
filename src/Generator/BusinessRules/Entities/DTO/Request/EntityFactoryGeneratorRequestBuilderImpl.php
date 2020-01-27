<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Entities\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Entities\Request\EntityFactoryGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Entities\Request\EntityFactoryGeneratorRequestBuilder;

class EntityFactoryGeneratorRequestBuilderImpl implements EntityFactoryGeneratorRequestBuilder
{
    /**
     * @var EntityFactoryGeneratorRequestDTO
     */
    private $request;

    public function create(): EntityFactoryGeneratorRequestBuilder
    {
        $this->request = new EntityFactoryGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): EntityFactoryGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): EntityFactoryGeneratorRequest
    {
        return $this->request;
    }
}
