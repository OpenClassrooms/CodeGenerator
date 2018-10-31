<?php

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelTestGeneratorRequestDTO implements ViewModelTestGeneratorRequest
{
    /**
     * @var string
     */
    public $responseClassName;

    public function getResponseClassName(): string
    {
        return $this->responseClassName;
    }
}
