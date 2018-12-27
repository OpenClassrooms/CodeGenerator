<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelListItemAssemblerImplTestGeneratorRequest;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelListItemAssemblerImplTestGeneratorRequestDTO implements ViewModelListItemAssemblerImplTestGeneratorRequest
{
    /**
     * @var string
     */
    public $responseClassName;

    public function getViewModelListItemAssemblerImplClassName(): string
    {
        return $this->responseClassName;
    }
}
