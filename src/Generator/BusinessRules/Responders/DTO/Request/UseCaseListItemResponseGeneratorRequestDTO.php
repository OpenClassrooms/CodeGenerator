<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseListItemResponseGeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseListItemResponseGeneratorRequestDTO implements UseCaseListItemResponseGeneratorRequest
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
