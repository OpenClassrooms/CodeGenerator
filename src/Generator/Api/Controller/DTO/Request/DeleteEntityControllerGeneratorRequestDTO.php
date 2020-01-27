<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Controller\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\DeleteEntityControllerGeneratorRequest;

class DeleteEntityControllerGeneratorRequestDTO implements DeleteEntityControllerGeneratorRequest
{
    /**
     * @var string
     */
    public $entityClassName;

    public function getEntityClassName(): string
    {
        return $this->entityClassName;
    }
}
