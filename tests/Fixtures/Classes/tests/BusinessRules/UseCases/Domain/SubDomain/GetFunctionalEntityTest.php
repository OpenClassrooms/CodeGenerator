<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\BusinessRules\UseCases\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\GetFunctionalEntityRequest;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\GetFunctionalEntityRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\GetFunctionalEntityRequestDTO;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\GetFunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\BusinessRules\Entities\Domain\SubDomain\FunctionalEntityStub1;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\BusinessRules\Gateways\InMemoryFunctionalEntityGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponseAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponseStub1;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponseTestCase;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GetFunctionalEntityTest extends TestCase
{
    use FunctionalEntityDetailResponseTestCase;

    const INVALID_ID = -1;

    /**
     * @var GetFunctionalEntityRequestDTO
     */
    private $request;

    /**
     * @var GetFunctionalEntity
     */
    private $useCase;

    /**
     * @test
     *
     * @expectedException \OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException
     */
    public function functionalEntityNotFoundShouldThrowException()
    {
        $this->request->id = self::INVALID_ID;
        $this->useCase->execute($this->request);
    }

    /**
     * @test
     */
    public function getFunctionalEntityShouldReturnResponse()
    {
        $response = $this->useCase->execute($this->request);

        $this->assertFunctionalDetailEntityResponse(new FunctionalEntityDetailResponseStub1(), $response);

        $this->fail("TODO: configure stub");
    }

    protected function setup()
    {
        $this->useCase = new GetFunctionalEntity();
        $this->useCase->setFunctionalEntityGateway(
            new InMemoryFunctionalEntityGateway([FunctionalEntityStub1::ID => new FunctionalEntityStub1()])
        );
        $this->useCase->setFunctionalEntityResponseAssembler(new FunctionalEntityDetailResponseAssemblerMock());
        $this->request = $this->buildRequest();
    }

    private function buildRequest(): GetFunctionalEntityRequest
    {
        $builder = new GetFunctionalEntityRequestBuilderImpl();

        return $builder
            ->create()
            ->withFunctionalEntityId(FunctionalEntityStub1::ID)
            ->build();
    }
}
