<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
interface FunctionalEntityResponse
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getField1(): string;

    /**
     * @return array
     */
    public function getField2(): array;

    /**
     * @return bool
     */
    public function isField3(): bool;
}
