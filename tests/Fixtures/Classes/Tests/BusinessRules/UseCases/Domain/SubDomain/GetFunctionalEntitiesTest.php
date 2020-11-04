<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\BusinessRules\UseCases\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Pagination;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\GetFunctionalEntitiesRequest;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\GetFunctionalEntitiesRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\GetFunctionalEntitiesRequestDTO;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\GetFunctionalEntities;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Entities\Domain\SubDomain\FunctionalEntityStub1;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Entities\Domain\SubDomain\FunctionalEntityStub2;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Gateways\Domain\SubDomain\InMemoryFunctionalEntityGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityListItemResponseAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityListItemResponseStub1;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityListItemResponseStub2;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityListItemResponseTestCase;
use PHPUnit\Framework\TestCase;

class GetFunctionalEntitiesTest extends TestCase
{
    use FunctionalEntityListItemResponseTestCase;

    private GetFunctionalEntitiesRequestDTO $request;

    private GetFunctionalEntities $useCase;

    /** @test */
    final public function withoutFunctionalEntitiesReturnEmpty(): void
    {
        InMemoryFunctionalEntityGateway::$functionalEntities = [];
        $response = $this->useCase->execute($this->request);
        $this->assertSame(0, $response->getTotalItems());
        $this->assertEmpty($response->getItems());
    }

    /** @test */
    final public function getFunctionalEntitiesShouldReturnResponse(): void
    {
        InMemoryFunctionalEntityGateway::$functionalEntities = [
            FunctionalEntityStub1::ID => new FunctionalEntityStub1(),
            FunctionalEntityStub2::ID => new FunctionalEntityStub2(),
        ];
        $response = $this->useCase->execute($this->request);
        $this->assertSame(2, $response->getTotalItems());
        $this->assertCount(2, $response->getItems());

        $this->assertFunctionalEntityListItemResponses(
            [
                new FunctionalEntityListItemResponseStub1(),
                new FunctionalEntityListItemResponseStub2(),
            ],
            $response->getItems()
        );

        $this->fail("TODO: configure stub");
    }

    protected function setup(): void
    {
        $this->useCase = new GetFunctionalEntities(
            new InMemoryFunctionalEntityGateway([FunctionalEntityStub1::ID => new FunctionalEntityStub1()]),
            new FunctionalEntityListItemResponseAssemblerMock()
        );
        $this->request = $this->buildRequest();
    }

    private function buildRequest(): GetFunctionalEntitiesRequest
    {
        $builder = new GetFunctionalEntitiesRequestBuilderImpl();

        return $builder
            ->create()
            ->withFilters([])
            ->withItemsPerPage(Pagination::ITEMS_PER_PAGE_DEFAULT)
            ->withPage()
            ->withSort([])
            ->build();
    }
}
