<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseDetailResponseGeneratorRequest;

class UseCaseDetailResponseGeneratorRequestDTO implements UseCaseDetailResponseGeneratorRequest
{
    public string $entity;

    /**
     * @var string[]
     */
    public array $fields;

    public function getEntityClassName(): string
    {
        return $this->entity;
    }

    public function getFields(): array
    {
        return $this->fields;
    }
}
