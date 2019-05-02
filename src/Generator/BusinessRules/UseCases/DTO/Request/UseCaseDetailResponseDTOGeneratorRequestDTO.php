<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseDetailResponseDTOGeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseDetailResponseDTOGeneratorRequestDTO implements UseCaseDetailResponseDTOGeneratorRequest
{
    /**
     * @var string
     */
    public $entity;

    /**
     * @var string[]
     */
    public $fields;

    public function getEntity(): string
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
