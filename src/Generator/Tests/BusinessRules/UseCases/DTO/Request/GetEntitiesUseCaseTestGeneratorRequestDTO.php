<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GetEntitiesUseCaseTestGeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntitiesUseCaseTestGeneratorRequestDTO implements GetEntitiesUseCaseTestGeneratorRequest
{
    /**
     * @var string
     */
    public $defaultValue;

    public function getEntity(): string
    {
        return $this->defaultValue;
    }
}
