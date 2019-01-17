<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailGeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelDetailGeneratorRequestDTO implements ViewModelDetailGeneratorRequest
{
    /**
     * @var string
     */
    public $className;

    /**
     * @var array
     */
    public $fields = [];

    /**
     * @var string
     */
    public $namespace;

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

    public function getUseCaseDetailResponseClassName(): string
    {
        return $this->className;
    }
}
