<?php declare(strict_types=1);
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException;
use OpenClassrooms\UseCase\BusinessRules\Entities\PaginatedCollection;

interface FunctionalEntityGateway
{
    /**
     * @throws FunctionalEntityNotFoundException
     */
    public function find($id): FunctionalEntity;

    /**
     * @return PaginatedCollection|FunctionalEntity[]
     */
    public function findAll(array $filters = [], array $sorts = [], array $pagination = []): iterable;

    public function insert(FunctionalEntity $functionalEntity): void;
}
