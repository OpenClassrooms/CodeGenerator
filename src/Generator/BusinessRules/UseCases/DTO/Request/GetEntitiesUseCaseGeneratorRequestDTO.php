<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntitiesUseCaseGeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntitiesUseCaseGeneratorRequestDTO implements GetEntitiesUseCaseGeneratorRequest
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