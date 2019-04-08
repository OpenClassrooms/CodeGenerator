<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\SelfGenerator\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\SelfGenerator\Request\CustomGeneratorRequest;

/**
 * @author authorStub <author.stub@example.com>
 */
class CustomGeneratorRequestDTO implements CustomGeneratorRequest
{
    /**
     * @var string
     */
    public $defaultValue;

    public function getDefaultValue(): string
    {
        return $this->defaultValue;
    }
}
