<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntityUseCaseRequestGeneratorRequest;

class GetEntityUseCaseRequestGeneratorRequestDTO implements GetEntityUseCaseRequestGeneratorRequest
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
