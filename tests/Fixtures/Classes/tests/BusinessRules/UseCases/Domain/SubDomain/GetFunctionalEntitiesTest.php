<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\BusinessRules\UseCases\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\GetFunctionalEntitiesRequest;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\GetFunctionalEntitiesRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\GetFunctionalEntitiesRequestDTO;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\GetFunctionalEntities;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\BusinessRules\Entities\Domain\SubDomain\FunctionalEntityStub1;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\BusinessRules\Gateways\InMemoryFunctionalEntityGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityListItemResponseAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityListItemResponseStub1;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityListItemResponseTestCase;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GetFunctionalEntitiesTest extends TestCase
{
    use FunctionalEntityListItemResponseTestCase;

    /**
     * @var GetFunctionalEntitiesRequestDTO
     */
    private $request;

    /**
     * @var GetFunctionalEntities
     */
    private $useCase;

    /**
     * @test
     */
    public function withoutFunctionalEntitiesReturnNothing()
    {
        InMemoryFunctionalEntityGateway::$functionalEntities = [];
        $response = $this->useCase->execute($this->request);
        $this->assertSame(0, $response->getTotalItems());
        $this->assertEmpty($response->getItems());
    }

    /**
     * @test
     */
    public function getFunctionalEntitiesShouldReturnResponse()
    {
        InMemoryFunctionalEntityGateway::$functionalEntities = [
            FunctionalEntityStub1::ID => new FunctionalEntityStub1(),
            FunctionalEntityStub2::ID => new FunctionalEntityStub2(),
        ];
        $response = $this->useCase->execute($this->request);
        $this->assertSame(2, $response->getTotalItems());
        $this->assertCount(2, $response->getItems());

        $this->assertFunctionalEntityListItemResponses(
            [new FunctionalEntityListItemResponseStub1(), new FunctionalEntityListItemResponseStub2()],
            $response->getItems()
        );

        $this->fail("TODO: configure stub");
    }

    protected function setup()
    {
        $this->useCase = new GetFunctionalEntities();
        $this->useCase->setFunctionalEntityGateway(
            new InMemoryFunctionalEntityGateway([FunctionalEntityStub1::ID => new FunctionalEntityStub1()])
        );
        $this->useCase->setFunctionalEntityListItemResponseAssembler(
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
            ->withItemsPerPage()
            ->withPage()
            ->withSort([])
            ->build();
    }
}
