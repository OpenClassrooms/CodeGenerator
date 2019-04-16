<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\GenericUseCaseDetailResponseGeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseDetailResponseGeneratorRequestDTO implements GenericUseCaseDetailResponseGeneratorRequest
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
