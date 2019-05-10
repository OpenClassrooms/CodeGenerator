<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseDetailResponseAssemblerImplGeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseDetailResponseAssemblerImplGeneratorRequestDTO implements UseCaseDetailResponseAssemblerImplGeneratorRequest
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

    public function getFields(): array
    {
        return $this->fields;
    }
}