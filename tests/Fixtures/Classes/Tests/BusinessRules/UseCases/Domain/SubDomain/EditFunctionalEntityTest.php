<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\BusinessRules\UseCases\Domain\SubDomain;

use Carbon\Carbon;
use OpenClassrooms\CodeGenerator\Tests\EntityUtil;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\EditFunctionalEntityRequest;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\EditFunctionalEntityRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\EditFunctionalEntityRequestDTO;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\EditFunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Entities\Domain\SubDomain\FunctionalEntityStub1;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Gateways\Domain\SubDomain\InMemoryFunctionalEntityGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponseAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponseStub1;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponseTestCase;
use PHPUnit\Framework\TestCase;

final class EditFunctionalEntityTest extends TestCase
{
    use FunctionalEntityDetailResponseTestCase;

    private EditFunctionalEntityRequestDTO $request;

    private EditFunctionalEntity $useCase;

    /**
     * @test
     */
    public function functionalEntityNotFoundShouldThrowException(): void
    {
        $this->expectException(FunctionalEntityNotFoundException::class);

        $this->request->functionalEntityId = -1;
        $this->useCase->execute($this->request);
    }

    /** @test */
    public function editFunctionalEntity(): void
    {
        $this->request->functionalEntityId = FunctionalEntityStub1::ID;
        $response = $this->useCase->execute($this->request);

        $expectedResponse = new FunctionalEntityDetailResponseStub1();
        EntityUtil::setId($expectedResponse, FunctionalEntityStub1::ID);
        $this->assertFunctionalEntityDetailResponse($expectedResponse, $response);
    }

    protected function setup(): void
    {
        $this->request = $this->buildRequest();
        $this->useCase = new EditFunctionalEntity(
            new InMemoryFunctionalEntityGateway([FunctionalEntityStub1::ID => new FunctionalEntityStub1()]),
            new FunctionalEntityDetailResponseAssemblerMock()
        );
    }

    private function buildRequest(): EditFunctionalEntityRequest
    {
        $builder = new EditFunctionalEntityRequestBuilderImpl();

        return $builder
            ->create()
            ->withField1(FunctionalEntityStub1::FIELD_1)
            ->withField2(FunctionalEntityStub1::FIELD_2)
            ->withField3(FunctionalEntityStub1::FIELD_3)
            ->withField4(new Carbon(FunctionalEntityStub1::FIELD_4))
            ->build();
    }
}
