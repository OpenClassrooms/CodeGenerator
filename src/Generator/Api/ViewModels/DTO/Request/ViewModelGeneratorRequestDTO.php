<?php

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelGeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelGeneratorRequestDTO implements ViewModelGeneratorRequest
{
    /**
     * @var string
     */
    public $className;

    /**
     * @var string
     */
    public $namespace;

    /**
     * @var array
     */
    public $fields = [];

    public function getResponseClassName(): string
    {
        return $this->className;
    }

    /**
     * @return array
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    public function getNamespace(): string
    {
        return $this->namespace;
    }

}
