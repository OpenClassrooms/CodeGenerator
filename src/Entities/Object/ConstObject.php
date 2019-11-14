<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities\Object;

use OpenClassrooms\CodeGenerator\Utility\StringUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ConstObject
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $value;

    public function __construct(string $name)
    {
        $this->name = $this->isValidConstantName($name) ? $name : StringUtility::convertToUpperSnakeCase($name);
    }

    private function isValidConstantName(string $string): bool
    {
        return (bool) preg_match('/(([A-Z_][A-Z0-9_]*)|(__.*__))$/', $string);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value): void
    {
        $this->value = $value;
    }
}
