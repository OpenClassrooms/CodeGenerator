<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\Entity\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\App\Entity\Request\EntityImplGeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class EntityImplGeneratorRequestDTO implements EntityImplGeneratorRequest
{
    /**
     * @var string
     */
    public $className;

    public function getUseCaseResponseClassName(): string
    {
        return $this->className;
    }
}
