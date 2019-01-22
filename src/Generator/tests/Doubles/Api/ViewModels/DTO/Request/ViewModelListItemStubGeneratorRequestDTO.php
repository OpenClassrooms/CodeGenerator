<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelListItemStubGeneratorRequest;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelListItemStubGeneratorRequestDTO implements ViewModelListItemStubGeneratorRequest
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
