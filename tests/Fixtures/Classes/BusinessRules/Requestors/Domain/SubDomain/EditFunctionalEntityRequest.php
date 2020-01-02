<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain;

use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCaseRequest;

interface EditFunctionalEntityRequest extends UseCaseRequest
{
    public function getField1(): string;

    public function getField2(): array;

    public function getField4(): ?\DateTimeInterface;

    public function getFunctionalEntityId(): int;

    public function isField1Updated(): bool;

    public function isField2Updated(): bool;

    public function isField3(): bool;

    public function isField3Updated(): bool;

    public function isField4Updated(): bool;
}
