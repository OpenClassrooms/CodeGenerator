<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
interface FunctionalEntityResponse
{
    public function getId(): int;

    public function getField1(): string;

    /**
     * @return string[]
     */
    public function getField2(): array;

    public function isField3(): bool;
}
