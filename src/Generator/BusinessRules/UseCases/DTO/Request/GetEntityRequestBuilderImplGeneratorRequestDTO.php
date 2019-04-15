<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityRequestBuilderImplGeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityRequestBuilderImplGeneratorRequestDTO implements GetEntityRequestBuilderImplGeneratorRequest
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
