<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseRequestDTOGeneratorRequest;

class GetEntityUseCaseRequestDTOGeneratorRequestDTO implements GetEntityUseCaseRequestDTOGeneratorRequest
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
