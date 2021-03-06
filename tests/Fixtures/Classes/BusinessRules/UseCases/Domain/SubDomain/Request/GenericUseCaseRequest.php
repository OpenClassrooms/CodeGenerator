<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\Request;

use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCaseRequest;

final class GenericUseCaseRequest implements UseCaseRequest
{
    public static function create(): self
    {
        return new self();
    }
}
