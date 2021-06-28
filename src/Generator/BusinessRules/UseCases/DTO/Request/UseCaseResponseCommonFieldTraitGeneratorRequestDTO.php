<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseCommonFieldTraitGeneratorRequest;

class UseCaseResponseCommonFieldTraitGeneratorRequestDTO implements UseCaseResponseCommonFieldTraitGeneratorRequest
{
    public string $entity;

    /**
     * @return string[]
     */
    public array $fields;

    public function getEntityClassName(): string
    {
        return $this->entity;
    }

    /**
     * {@inheritDoc}
     */
    public function getFields(): array
    {
        return $this->fields;
    }
}
