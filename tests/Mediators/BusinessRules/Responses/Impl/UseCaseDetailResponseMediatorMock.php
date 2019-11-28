<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\Responses\Impl;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request\UseCaseDetailResponseAssemblerGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request\UseCaseDetailResponseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\UseCaseDetailResponseAssemblerGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\UseCaseDetailResponseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\UseCaseDetailResponseAssemblerImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\UseCaseDetailResponseDTOGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseDetailResponseAssemblerImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseDetailResponseDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\DTO\Request\UseCaseDetailResponseStubGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\UseCaseDetailResponseStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request\UseCaseDetailResponseAssemblerMockGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request\UseCaseDetailResponseTestCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseAssemblerMockGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseTestCaseGenerator;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Responses\Impl\UseCaseDetailResponseMediatorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders\UseCaseDetailResponseAssemblerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders\UseCaseDetailResponseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseDetailResponseAssemblerImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseDetailResponseDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Responders\UseCaseDetailResponseStub\UseCaseDetailResponseStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseAssemblerMockFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseTestCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Generator\GeneratorMock;

class UseCaseDetailResponseMediatorMock extends UseCaseDetailResponseMediatorImpl
{
    public function __construct()
    {
        $this->setUseCaseDetailResponseAssemblerGenerator(
            new GeneratorMock(
                UseCaseDetailResponseAssemblerGenerator::class,
                new UseCaseDetailResponseAssemblerFileObjectStub1()
            )
        );
        $this->setUseCaseDetailResponseAssemblerGeneratorRequestBuilder(
            new UseCaseDetailResponseAssemblerGeneratorRequestBuilderImpl()
        );
        $this->setUseCaseDetailResponseGenerator(
            new GeneratorMock(UseCaseDetailResponseGenerator::class, new UseCaseDetailResponseFileObjectStub1())
        );
        $this->setUseCaseDetailResponseGeneratorRequestBuilder(new UseCaseDetailResponseGeneratorRequestBuilderImpl());
        $this->setUseCaseDetailResponseAssemblerImplGenerator(
            new GeneratorMock(
                UseCaseDetailResponseAssemblerImplGenerator::class,
                new UseCaseDetailResponseAssemblerImplFileObjectStub1()
            )
        );
        $this->setUseCaseDetailResponseAssemblerImplGeneratorRequestBuilder(
            new UseCaseDetailResponseAssemblerImplGeneratorRequestBuilderImpl()
        );
        $this->setUseCaseDetailResponseDTOGenerator(
            new GeneratorMock(UseCaseDetailResponseDTOGenerator::class, new UseCaseDetailResponseDTOFileObjectStub1())
        );
        $this->setUseCaseDetailResponseDTOGeneratorRequestBuilder(
            new UseCaseDetailResponseDTOGeneratorRequestBuilderImpl()
        );
        $this->setUseCaseDetailResponseStubGenerator(
            new GeneratorMock(UseCaseDetailResponseStubGenerator::class, new UseCaseDetailResponseStubFileObjectStub1())
        );
        $this->setUseCaseDetailResponseStubGeneratorRequestBuilder(
            new UseCaseDetailResponseStubGeneratorRequestBuilderImpl()
        );
        $this->setUseCaseDetailResponseAssemblerMockGenerator(
            new GeneratorMock(
                UseCaseDetailResponseAssemblerMockGenerator::class,
                new UseCaseDetailResponseAssemblerMockFileObjectStub1()
            )
        );
        $this->setUseCaseDetailResponseAssemblerMockGeneratorRequestBuilder(
            new UseCaseDetailResponseAssemblerMockGeneratorRequestBuilderImpl()
        );
        $this->setUseCaseDetailResponseTestCaseGenerator(
            new GeneratorMock(
                UseCaseDetailResponseTestCaseGenerator::class,
                new UseCaseDetailResponseTestCaseFileObjectStub1()
            )
        );
        $this->setUseCaseDetailResponseTestCaseGeneratorRequestBuilder(
            new UseCaseDetailResponseTestCaseGeneratorRequestBuilderImpl()
        );
    }
}
