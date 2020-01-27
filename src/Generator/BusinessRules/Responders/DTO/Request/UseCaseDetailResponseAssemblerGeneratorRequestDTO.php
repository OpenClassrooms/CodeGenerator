<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseDetailResponseAssemblerGeneratorRequest;

class UseCaseDetailResponseAssemblerGeneratorRequestDTO implements UseCaseDetailResponseAssemblerGeneratorRequest
{
    /**
     * @var string
     */
    public $entity;

    public function getEntityClassName(): string
    {
        return $this->entity;
    }
}
