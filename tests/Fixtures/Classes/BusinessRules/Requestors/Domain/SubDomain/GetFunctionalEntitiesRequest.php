<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain;

use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCaseRequest;

interface GetFunctionalEntitiesRequest extends UseCaseRequest
{
    /**
     * @return string[]
     */
    public function getFilters(): array;

    public function getItemsPerPage(): int;

    public function getPage(): int;

    /**
     * @return string[]
     */
    public function getSorts(): array;
}
