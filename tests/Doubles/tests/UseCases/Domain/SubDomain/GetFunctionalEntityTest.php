<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\tests\UseCases\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Doubles\tests\Doubles\OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Entities\Domain\SubDomain\FunctionalEntityStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\tests\Doubles\OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Gateways\Domain\SubDomain\InMemoryFunctionalEntityGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\tests\Doubles\OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponseStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\tests\Doubles\OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponseTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\GetFunctionalEntityRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityDetailResponseAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\GetFunctionalEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class GetFunctionalEntityTest extends TestCase
{
    use FunctionalEntityResponseTestCase;

    /**
     * @var \OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\GetFunctionalEntityRequestDTO
     */
    private $request;

    /**
     * @var \OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\GetFunctionalEntity
     */
    private $useCase;

    /**
     * @test
     * @expectedException \OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Gateways\Domain\SubDomain\FunctionalEntityNotFoundException
     */
    public function NonExistingFunctionalEntity_ThrowException()
    {
        $this->request->id = -1;
        $this->useCase->execute($this->request);
    }

    /**
     * @test
     */
    public function Execute_ReturnResponse()
    {
        $response = $this->useCase->execute($this->request);
        $this->assertFunctionalEntityDetailResponse(new FunctionalEntityDetailResponseStub1(), $response);
    }

    protected function setUp()
    {
        $this->useCase = new GetFunctionalEntity();
        $this->useCase->setFunctionalEntityDetailResponseAssembler(new FunctionalEntityDetailResponseAssemblerImpl());
        $this->useCase->setFunctionalEntityGateway(
            new InMemoryFunctionalEntityGateway([FunctionalEntityStub1::ID => new FunctionalEntityStub1()])
        );

        $useCaseRequestBuilder = new GetFunctionalEntityRequestBuilderImpl();
        $this->request = $useCaseRequestBuilder->create()
            ->withId(FunctionalEntityStub1::ID)
            ->build();
    }
}
