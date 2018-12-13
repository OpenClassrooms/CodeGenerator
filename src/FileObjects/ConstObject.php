<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\FileObjects;

use OpenClassrooms\CodeGenerator\Utility\StringUtility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ConstObject
{
    use StringUtility;

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
        $this->name = self::isValidConstantName($name) ? $name : self::convertToUpperSnakeCase($name);
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
