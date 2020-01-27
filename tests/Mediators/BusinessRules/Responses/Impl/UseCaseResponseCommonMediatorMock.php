<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\Responses\Impl;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request\UseCaseResponseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\UseCaseResponseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\UseCaseResponseAssemblerTraitGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\UseCaseResponseCommonFieldTraitGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseResponseAssemblerTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseResponseCommonFieldTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request\UseCaseResponseTestCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\UseCaseResponseTestCaseGenerator;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Responses\Impl\UseCaseResponseCommonMediatorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders\UseCaseResponseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseResponseAssemblerTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseResponseCommonFieldTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Responders\UseCaseResponseTestCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Generator\GeneratorMock;

class UseCaseResponseCommonMediatorMock extends UseCaseResponseCommonMediatorImpl
{
    public function __construct()
    {
        $this->setUseCaseResponseAssemblerTraitGenerator(
            new GeneratorMock(
                UseCaseResponseAssemblerTraitGenerator::class,
                new UseCaseResponseAssemblerTraitFileObjectStub1()
            )
        );
        $this->setUseCaseResponseAssemblerTraitGeneratorRequestBuilder(
            new UseCaseResponseAssemblerTraitGeneratorRequestBuilderImpl()
        );
        $this->setUseCaseResponseCommonFieldTraitGenerator(
            new GeneratorMock(
                UseCaseResponseCommonFieldTraitGenerator::class,
                new UseCaseResponseCommonFieldTraitFileObjectStub1()
            )
        );
        $this->setUseCaseResponseCommonFieldTraitGeneratorRequestBuilder(
            new UseCaseResponseCommonFieldTraitGeneratorRequestBuilderImpl()
        );
        $this->setUseCaseResponseGenerator(
            new GeneratorMock(UseCaseResponseGenerator::class, new UseCaseResponseFileObjectStub1())
        );
        $this->setUseCaseResponseGeneratorRequestBuilder(new UseCaseResponseGeneratorRequestBuilderImpl());
        $this->setUseCaseResponseTestCaseGenerator(
            new GeneratorMock(UseCaseResponseTestCaseGenerator::class, new UseCaseResponseTestCaseFileObjectStub1())
        );
        $this->setUseCaseResponseTestCaseGeneratorRequestBuilder(
            new UseCaseResponseTestCaseGeneratorRequestBuilderImpl()
        );
    }
}
