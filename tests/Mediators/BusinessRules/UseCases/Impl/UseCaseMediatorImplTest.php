<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Requestors\Impl\GenericUseCaseRequestMediatorImpl;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Requestors\Impl\RequestorsMediatorImpl;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl\GenericUseCaseMediatorImpl;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl\UseCaseMediatorImpl;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\UseCaseMediator;
use PHPUnit\Framework\TestCase;

class UseCaseMediatorImplTest extends TestCase
{
    private UseCaseMediator $useCaseMediator;

    /**
     * @test
     */
    public function mediate_ReturnFileObject(): void
    {
        $expectedFileObjects = $this->useCaseMediator->mediate();

        $this->assertIsArray($expectedFileObjects);
        $this->assertNotEmpty($expectedFileObjects);
        foreach ($expectedFileObjects as $fileObject) {
            $this->assertInstanceOf(FileObject::class, $fileObject);
        }
    }

    protected function setUp(): void
    {
        $this->useCaseMediator = new UseCaseMediatorImpl();

        $genericUseCaseMediator = $this->createMock(GenericUseCaseMediatorImpl::class);
        $genericUseCaseRequestMediator = $this->createMock(GenericUseCaseRequestMediatorImpl::class);

        $genericUseCaseRequestMediator
            ->expects($this->once())
            ->method('mediate')
            ->willReturn([new FileObject(self::class)]);

        $genericUseCaseRequestMediator
            ->expects($this->once())
            ->method('mediate')
            ->willReturn([new FileObject(self::class)]);

        $this->useCaseMediator->setGenericUseCaseMediator($genericUseCaseMediator);
        $this->useCaseMediator->setGenericUseCaseRequestMediator($genericUseCaseRequestMediator);
    }
}
