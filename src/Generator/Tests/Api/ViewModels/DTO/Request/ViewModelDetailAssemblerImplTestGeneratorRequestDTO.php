<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelDetailAssemblerImplTestGeneratorRequest;

class ViewModelDetailAssemblerImplTestGeneratorRequestDTO implements ViewModelDetailAssemblerImplTestGeneratorRequest
{
    /**
     * @var string
     */
    public $responseClassName;

    public function getUseCaseResponseClassName(): string
    {
        return $this->responseClassName;
    }
}
