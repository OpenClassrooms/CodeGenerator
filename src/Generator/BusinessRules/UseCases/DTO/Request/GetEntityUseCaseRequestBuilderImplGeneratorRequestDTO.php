<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseRequestBuilderImplGeneratorRequest;

class GetEntityUseCaseRequestBuilderImplGeneratorRequestDTO implements GetEntityUseCaseRequestBuilderImplGeneratorRequest
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
