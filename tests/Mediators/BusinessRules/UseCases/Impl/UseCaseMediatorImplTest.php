<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Requestors\Impl\RequestMediatorImpl;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl\GenericUseCaseMediatorImpl;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl\UseCaseMediatorImpl;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\UseCaseMediator;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseMediatorImplTest extends TestCase
{
    /**
     * @var UseCaseMediator
     */
    private $useCaseMediator;

    /**
     * @test
     */
    public function mediate_ReturnFileObject()
    {
        $expectedFileObjects = $this->useCaseMediator->mediate();

        $this->assertInternalType('array', $expectedFileObjects);
        $this->assertNotEmpty($expectedFileObjects);
        foreach ($expectedFileObjects as $fileObject) {
            $this->assertInstanceOf(FileObject::class, $fileObject);
        }
    }

    protected function setUp()
    {
        $this->useCaseMediator = new UseCaseMediatorImpl();

        $genericUseCaseMediator = $this->createMock(GenericUseCaseMediatorImpl::class);
        $requestMediator = $this->createMock(RequestMediatorImpl::class);

        $requestMediator
            ->expects($this->once())
            ->method('mediate')
            ->willReturn([new FileObject(self::class)]);

        $requestMediator
            ->expects($this->once())
            ->method('mediate')
            ->willReturn([new FileObject(self::class)]);

        $this->useCaseMediator->setGenericUseCaseMediator($genericUseCaseMediator);
        $this->useCaseMediator->setRequestMediator($requestMediator);
    }
}
