<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\Request\CustomGeneratorRequest;

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
