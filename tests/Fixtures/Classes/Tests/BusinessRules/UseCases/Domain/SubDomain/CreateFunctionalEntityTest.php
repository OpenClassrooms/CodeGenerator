<?php declare(strict_types=1);
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\BusinessRules\UseCases\Domain\SubDomain;

use Carbon\Carbon;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\App\Entity\Domain\SubDomain\FunctionalEntityFactoryImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\CreateFunctionalEntityRequest;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\CreateFunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\CreateFunctionalEntityRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\CreateFunctionalEntityRequestDTO;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Entities\Domain\SubDomain\FunctionalEntityStub1;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Gateways\Domain\SubDomain\InMemoryFunctionalEntityGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponseAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponseStub1;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponseTestCase;
use PHPUnit\Framework\TestCase;

final class CreateFunctionalEntityTest extends TestCase
{
    use FunctionalEntityDetailResponseTestCase;

    /**
     * @var CreateFunctionalEntityRequestDTO
     */
    private $request;

    /**
     * @var CreateFunctionalEntity
     */
    private $useCase;

    /**
     * @test
     */
    public function createFunctionalEntityShouldReturnResponse(): void
    {
        $response = $this->useCase->execute($this->request);

        $this->assertFunctionalEntityDetailResponse(new FunctionalEntityDetailResponseStub1(), $response);
    }

    protected function setup(): void
    {
        $this->request = $this->buildRequest();
        $this->useCase = new CreateFunctionalEntity(
            new FunctionalEntityDetailResponseAssemblerMock(),
            new FunctionalEntityFactoryImpl(),
            new InMemoryFunctionalEntityGateway(
                [FunctionalEntityStub1::ID => new FunctionalEntityStub1()]
            )
        );
    }

    private function buildRequest(): CreateFunctionalEntityRequest
    {
        $builder = new CreateFunctionalEntityRequestBuilderImpl();

        return $builder
            ->create()
            ->withField1(FunctionalEntityStub1::FIELD_1)
            ->withField2(FunctionalEntityStub1::FIELD_2)
            ->withField3(FunctionalEntityStub1::FIELD_3)
            ->withField4(new Carbon(FunctionalEntityStub1::FIELD_4))
            ->build();
    }
}