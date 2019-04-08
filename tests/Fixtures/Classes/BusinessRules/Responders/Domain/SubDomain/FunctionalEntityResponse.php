<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain;

use OpenClassrooms\UseCase\BusinessRules\Responders\UseCaseResponse;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface FunctionalEntityResponse extends UseCaseResponse
{
    public function getId(): int;

    public function getField1(): string;

    /**
     * @return string[]
     */
    public function getField2(): array;

    public function isField3(): bool;
}
