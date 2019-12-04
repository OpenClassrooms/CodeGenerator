<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\Repository\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\App\Repository\Request\EntityRepositoryGeneratorRequest;

class EntityRepositoryGeneratorRequestDTO implements EntityRepositoryGeneratorRequest
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
