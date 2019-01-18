<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemImplGeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelListItemImplGeneratorRequestDTO implements ViewModelListItemImplGeneratorRequest
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

    public function getUseCaseResponseClassName(): string
    {
        return $this->className;
    }
}
