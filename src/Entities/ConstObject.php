<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities;

use OpenClassrooms\CodeGenerator\Utility\StringUtility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
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
        $this->name = StringUtility::isValidConstantName($name) ? $name : StringUtility::convertToUpperSnakeCase($name);
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
