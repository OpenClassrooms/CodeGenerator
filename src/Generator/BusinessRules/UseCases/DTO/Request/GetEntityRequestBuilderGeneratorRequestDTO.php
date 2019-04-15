<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityRequestBuilderGeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityRequestBuilderGeneratorRequestDTO implements GetEntityRequestBuilderGeneratorRequest
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
