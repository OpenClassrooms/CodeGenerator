<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailImplGeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelDetailImplGeneratorRequestDTO implements ViewModelDetailImplGeneratorRequest
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
