<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseCommonFieldTraitGeneratorRequest;

class UseCaseResponseCommonFieldTraitGeneratorRequestDTO implements UseCaseResponseCommonFieldTraitGeneratorRequest
{
    /**
     * @var string
     */
    public $entity;

    /**
     * @return string[]
     */
    public $fields;

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
