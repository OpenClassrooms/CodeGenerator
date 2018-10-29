<?php

namespace Generator\Tests\Api\ViewModels\DTO\Request;

use Generator\GeneratorRequest;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelTestGeneratorRequestDTO implements GeneratorRequest
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
