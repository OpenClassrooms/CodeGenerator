<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Models\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\Models\Request\EntityModelTraitGeneratorRequest;

class EntityModelTraitGeneratorRequestDTO implements EntityModelTraitGeneratorRequest
{
    public string $entityClassName;

    public function getEntityClassName(): string
    {
        return $this->entityClassName;
    }
}
