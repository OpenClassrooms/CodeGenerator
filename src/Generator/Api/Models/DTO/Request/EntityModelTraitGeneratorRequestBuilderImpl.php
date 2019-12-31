<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Models\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\Models\Request\EntityModelTraitGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\Request\EntityModelTraitGeneratorRequestBuilder;

class EntityModelTraitGeneratorRequestBuilderImpl implements EntityModelTraitGeneratorRequestBuilder
{
    /**
     * @var EntityModelTraitGeneratorRequestDTO
     */
    private $request;

    public function create(): EntityModelTraitGeneratorRequestBuilder
    {
        $this->request = new EntityModelTraitGeneratorRequestDTO();

        return $this;
    }

    public function withEntityClassName(string $entityClassName): EntityModelTraitGeneratorRequestBuilder
    {
        $this->request->entityClassName = $entityClassName;

        return $this;
    }

    public function build(): EntityModelTraitGeneratorRequest
    {
        return $this->request;
    }
}
