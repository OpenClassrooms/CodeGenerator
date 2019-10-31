<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\Entity\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\App\Entity\Request\EntityFactoryImplGeneratorRequest;

class EntityFactoryImplGeneratorRequestDTO implements EntityFactoryImplGeneratorRequest
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
