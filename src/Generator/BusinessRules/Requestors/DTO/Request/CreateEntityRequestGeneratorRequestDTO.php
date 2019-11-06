<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\CreateEntityRequestGeneratorRequest;

class CreateEntityRequestGeneratorRequestDTO implements CreateEntityRequestGeneratorRequest
{
    /**
     * @var string
     */
    public $entityClassName;

    /**
     * @var array
     */
    public $fields;

    public function getEntityClassName(): string
    {
        return $this->entityClassName;
    }

    public function getFields(): array
    {
        return $this->fields;
    }
}
