<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\Requestors\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\GenericUseCaseRequestBuilderGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\GenericUseCaseRequestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GenericUseCaseRequestBuilderGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GenericUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Requestors\Impl\RequestMediatorImpl;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Requestors\RequestMediator;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\BusinessRules\Requestors\GenericUseCaseRequestBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\BusinessRules\Requestors\GenericUseCaseRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Generator\GeneratorMock;
use OpenClassrooms\CodeGenerator\Tests\Mediators\FlushedFileObjectTestCase;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class RequestMediatorImplTest extends TestCase
{
    use FlushedFileObjectTestCase;

    /**
     * @var RequestMediator
     */
    private $mediator;

    /**
     * @var array
     */
    private $options;

    /**
     * @test
     */
    public function generateGenericUseCaseRequest_withoutTest()
    {
        $this->options[Options::NO_TEST] = null;
        $fileObjects = $this->mediator->mediate(
            [Args::CLASS_NAME => GenericUseCaseRequestFileObjectStub1::CLASS_NAME],
            $this->options
        );

        $this->assertFlushedFileObject($fileObjects);
    }

    /**
     * @test
     */
    public function generateGenericUseCaseRequest_withDump()
    {
        $this->options[Options::DUMP] = null;
        $fileObjects = $this->mediator->mediate(
            [Args::CLASS_NAME => GenericUseCaseRequestFileObjectStub1::CLASS_NAME],
            $this->options
        );

        $this->assertEmpty(InMemoryFileObjectGateway::$flushedFileObjects);
        $this->assertNotEmpty(InMemoryFileObjectGateway::$fileObjects);
        foreach ($fileObjects as $fileObject) {
            /** @var FileObject $fileObject */
            $this->assertArrayHasKey($fileObject->getClassName(), InMemoryFileObjectGateway::$fileObjects);
        }
    }

    /**
     * @test
     */
    public function generateGenericUseCaseRequest_withoutOptions()
    {
        $fileObjects = $this->mediator->mediate(
            [Args::CLASS_NAME => GenericUseCaseRequestFileObjectStub1::CLASS_NAME],
            $this->options

        );

        $this->assertFlushedFileObject($fileObjects);
    }

    protected function setUp()
    {
        InMemoryFileObjectGateway::$fileObjects = [];
        $this->mediator = new RequestMediatorImpl();
        $this->mediator->setFileObjectGateway(new InMemoryFileObjectGateway());

        $this->options = [
            Options::DUMP       => false,
            Options::NO_TEST    => false,
            Options::TESTS_ONLY => false,
        ];

        $this->mediator->setGenericUseCaseRequestBuilderGenerator(
            new GeneratorMock(
                GenericUseCaseRequestBuilderGenerator::class,
                new GenericUseCaseRequestBuilderFileObjectStub1()
            )
        );
        $this->mediator->setGenericUseCaseRequestBuilderGeneratorRequestBuilder(
            new GenericUseCaseRequestBuilderGeneratorRequestBuilderImpl()
        );
        $this->mediator->setGenericUseCaseRequestGenerator(
            new GeneratorMock(GenericUseCaseRequestGenerator::class, new GenericUseCaseRequestFileObjectStub1())
        );
        $this->mediator->setGenericUseCaseRequestGeneratorRequestBuilder(
            new GenericUseCaseRequestGeneratorRequestBuilderImpl()
        );
    }
}