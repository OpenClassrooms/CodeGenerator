<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemGeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelListItemGeneratorRequestDTO implements ViewModelListItemGeneratorRequest
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
