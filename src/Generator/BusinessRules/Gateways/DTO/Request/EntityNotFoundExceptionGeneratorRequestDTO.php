<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request\EntityNotFoundExceptionGeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class EntityNotFoundExceptionGeneratorRequestDTO implements EntityNotFoundExceptionGeneratorRequest
{
    /**
     * @var string
     */
    public $entity;

    public function getEnity(): string
    {
        return $this->entity;
    }
}
