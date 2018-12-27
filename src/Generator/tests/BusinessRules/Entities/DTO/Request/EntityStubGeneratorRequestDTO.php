<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\Request\EntityStubGeneratorRequest;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class EntityStubGeneratorRequestDTO implements EntityStubGeneratorRequest
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

    public function getEntityClassName(): string
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
