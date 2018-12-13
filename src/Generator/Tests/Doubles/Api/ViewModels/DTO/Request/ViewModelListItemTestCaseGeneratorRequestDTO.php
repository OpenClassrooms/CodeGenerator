<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelListItemTestCaseGeneratorRequest;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelListItemTestCaseGeneratorRequestDTO implements ViewModelListItemTestCaseGeneratorRequest
{
    /**
     * @var string
     */
    public $className;

    public function getViewModelListItemClassName(): string
    {
        return $this->className;
    }
}
