<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseDetailResponseAssemblerGeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseDetailResponseAssemblerGeneratorRequestDTO implements UseCaseDetailResponseAssemblerGeneratorRequest
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
