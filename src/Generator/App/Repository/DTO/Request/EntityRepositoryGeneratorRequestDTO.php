<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\Repository\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\App\Repository\Request\EntityRepositoryGeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class EntityRepositoryGeneratorRequestDTO implements EntityRepositoryGeneratorRequest
{
    /**
     * @var string
     */
    public $entity;

    public function getEntity(): string
    {
        return $this->entity;
    }
}
