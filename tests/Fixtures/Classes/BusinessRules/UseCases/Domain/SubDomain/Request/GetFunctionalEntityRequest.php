<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\Request;

use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCaseRequest;

final class GetFunctionalEntityRequest implements UseCaseRequest
{
    public int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public static function create(int $id): self
    {
        return new self($id);
    }

    public function getFunctionalEntityId(): int
    {
        return $this->id;
    }
}
