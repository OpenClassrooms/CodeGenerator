<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseListItemResponseStubGeneratorRequest;

class UseCaseListItemResponseStubGeneratorRequestDTO implements UseCaseListItemResponseStubGeneratorRequest
{
    /**
     * @var string
     */
    public $className;

    /**
     * @var array
     */
    public $fields;

    public function getClassName(): string
    {
        return $this->className;
    }

    /**
     * {@inheritdoc}
     */
    public function getFields(): array
    {
        return $this->fields;
    }
}
