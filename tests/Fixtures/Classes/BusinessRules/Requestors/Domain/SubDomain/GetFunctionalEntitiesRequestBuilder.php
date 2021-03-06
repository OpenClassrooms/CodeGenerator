<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain;

use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCaseRequest;

interface GetFunctionalEntitiesRequestBuilder extends UseCaseRequest
{
    public function create(): GetFunctionalEntitiesRequestBuilder;

    public function withFilters(array $filters = []): GetFunctionalEntitiesRequestBuilder;

    public function withItemsPerPage(int $itemsPerPage): GetFunctionalEntitiesRequestBuilder;

    public function withPage(int $page = 1): GetFunctionalEntitiesRequestBuilder;

    public function withSort(array $sort = []): GetFunctionalEntitiesRequestBuilder;

    public function build(): GetFunctionalEntitiesRequest;
}
