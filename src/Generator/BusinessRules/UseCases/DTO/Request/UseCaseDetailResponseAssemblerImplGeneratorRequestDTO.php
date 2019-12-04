<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseDetailResponseAssemblerImplGeneratorRequest;

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

    public function getEntityClassName(): string
    {
        return $this->entity;
    }

    public function getFields(): array
    {
        return $this->fields;
    }
}
