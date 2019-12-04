<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseDetailResponseTestCaseGeneratorRequest;

class UseCaseDetailResponseTestCaseGeneratorRequestDTO implements UseCaseDetailResponseTestCaseGeneratorRequest
{
    /**
     * @var string
     */
    public $entity;

    /**
     * @var string[]
     */
    public $fields;

    public function getEntityClassName(): string
    {
        return $this->entity;
    }

    /**
     * {@inheritdoc}
     */
    public function getFields(): array
    {
        return $this->fields;
    }
}
