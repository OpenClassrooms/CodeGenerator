<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseDetailResponseAssemblerMockGeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseDetailResponseAssemblerMockGeneratorRequestDTO implements UseCaseDetailResponseAssemblerMockGeneratorRequest
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
