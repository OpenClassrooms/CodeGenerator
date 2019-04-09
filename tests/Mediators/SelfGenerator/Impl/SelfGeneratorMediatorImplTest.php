<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators\SelfGenerator\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Generator\SelfGenerator\DTO\Request\SelfGeneratorGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use OpenClassrooms\CodeGenerator\Mediators\SelfGenerator\Impl\SelfGeneratorMediatorImpl;
use OpenClassrooms\CodeGenerator\Mediators\SelfGenerator\SelfGeneratorMediator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\SelfGenerator\SelfGeneratorFileObjectsStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Generator\SelfGeneratorGeneratorMock;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class SelfGeneratorMediatorImplTest extends TestCase
{
    /**
     * @var SelfGeneratorMediator
     */
    private $mediator;

    /**
     * @test
     */
    public function mediate_ReturnFileObject()
    {
        $expectedFileObjects = $this->mediator->mediate(
            [
                Args::DOMAIN => 'Api\ViewModels',
                Args::ENTITY => 'FunctionalEntity',
            ],
            [Options::DUMP => false,]
        );

        $this->assertInternalType('array', $expectedFileObjects);
        $this->assertNotEmpty($expectedFileObjects);
        foreach ($expectedFileObjects as $fileObject) {
            $this->assertInstanceOf(FileObject::class, $fileObject);
        }
    }

    protected function setUp()
    {
        $this->mediator = new SelfGeneratorMediatorImpl();
        $selfGeneratorFileObjectsStub1 = new SelfGeneratorFileObjectsStub1();

        $this->mediator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->mediator->setSelfGeneratorGenerator(
            new SelfGeneratorGeneratorMock($selfGeneratorFileObjectsStub1::$fileObjects)
        );
        $this->mediator->setSelfGeneratorGeneratorRequestBuilder(
            new SelfGeneratorGeneratorRequestBuilderImpl()
        );
    }
}
