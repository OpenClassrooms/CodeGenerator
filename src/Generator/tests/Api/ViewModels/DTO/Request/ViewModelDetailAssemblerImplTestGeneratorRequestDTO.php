<?php

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request;


use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelDetailAssemblerImplTestGeneratorRequest;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelDetailAssemblerImplTestGeneratorRequestDTO implements ViewModelDetailAssemblerImplTestGeneratorRequest
{
    /**
     * @var string
     */
    public $responseClassName;

    public function getViewModelDetailAssemblerImplClassName(): string
    {
        return $this->responseClassName;
    }
}
