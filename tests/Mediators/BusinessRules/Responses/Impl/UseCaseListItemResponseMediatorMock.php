<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\Responses\Impl;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request\UseCaseListItemResponseAssemblerGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request\UseCaseListItemResponseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\UseCaseListItemResponseAssemblerGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\UseCaseListItemResponseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\UseCaseListItemResponseAssemblerImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\UseCaseListItemResponseDTOGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseListItemResponseAssemblerImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseListItemResponseDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\DTO\Request\UseCaseListItemResponseStubGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\UseCaseListItemResponseStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request\UseCaseListItemResponseAssemblerMockGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request\UseCaseListItemResponseTestCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseAssemblerMockGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseTestCaseGenerator;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Responses\Impl\UseCaseListItemResponseMediatorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders\UseCaseListItemResponseAssemblerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders\UseCaseListItemResponseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseListItemResponseAssemblerImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseListItemResponseDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Responders\UseCaseListItemResponseStub\UseCaseListItemResponseStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseAssemblerMockFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseTestCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Generator\GeneratorMock;

class UseCaseListItemResponseMediatorMock extends UseCaseListItemResponseMediatorImpl
{
    public function __construct()
    {
        $this->setUseCaseListItemResponseAssemblerGenerator(
            new GeneratorMock(
                UseCaseListItemResponseAssemblerGenerator::class,
                new UseCaseListItemResponseAssemblerFileObjectStub1()
            )
        );
        $this->setUseCaseListItemResponseAssemblerGeneratorRequestBuilder(
            new UseCaseListItemResponseAssemblerGeneratorRequestBuilderImpl()
        );
        $this->setUseCaseListItemResponseGenerator(
            new GeneratorMock(UseCaseListItemResponseGenerator::class, new UseCaseListItemResponseFileObjectStub1())
        );
        $this->setUseCaseListItemResponseGeneratorRequestBuilder(
            new UseCaseListItemResponseGeneratorRequestBuilderImpl()
        );
        $this->setUseCaseListItemResponseAssemblerImplGenerator(
            new GeneratorMock(
                UseCaseListItemResponseAssemblerImplGenerator::class,
                new UseCaseListItemResponseAssemblerImplFileObjectStub1()
            )
        );
        $this->setUseCaseListItemResponseAssemblerImplGeneratorRequestBuilder(
            new UseCaseListItemResponseAssemblerImplGeneratorRequestBuilderImpl()
        );
        $this->setUseCaseListItemResponseDTOGenerator(
            new GeneratorMock(
                UseCaseListItemResponseDTOGenerator::class,
                new UseCaseListItemResponseDTOFileObjectStub1()
            )
        );
        $this->setUseCaseListItemResponseDTOGeneratorRequestBuilder(
            new UseCaseListItemResponseDTOGeneratorRequestBuilderImpl()
        );
        $this->setUseCaseListItemResponseStubGenerator(
            new GeneratorMock(
                UseCaseListItemResponseStubGenerator::class,
                new UseCaseListItemResponseStubFileObjectStub1()
            )
        );
        $this->setUseCaseListItemResponseStubGeneratorRequestBuilder(
            new UseCaseListItemResponseStubGeneratorRequestBuilderImpl()
        );
        $this->setUseCaseListItemResponseAssemblerMockGenerator(
            new GeneratorMock(
                UseCaseListItemResponseAssemblerMockGenerator::class,
                new UseCaseListItemResponseAssemblerMockFileObjectStub1()
            )
        );
        $this->setUseCaseListItemResponseAssemblerMockGeneratorRequestBuilder(
            new UseCaseListItemResponseAssemblerMockGeneratorRequestBuilderImpl()
        );
        $this->setUseCaseListItemResponseTestCaseGenerator(
            new GeneratorMock(
                UseCaseListItemResponseTestCaseGenerator::class,
                new UseCaseListItemResponseTestCaseFileObjectStub1()
            )
        );
        $this->setUseCaseListItemResponseTestCaseGeneratorRequestBuilder(
            new UseCaseListItemResponseTestCaseGeneratorRequestBuilderImpl()
        );
    }
}
