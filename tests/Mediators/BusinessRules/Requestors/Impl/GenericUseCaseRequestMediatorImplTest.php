<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\Requestors\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\GenericUseCaseRequestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GenericUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Requestors\GenericUseCaseRequestMediator;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Requestors\Impl\GenericUseCaseRequestMediatorImpl;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\GenericUseCaseRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Generator\GeneratorMock;
use OpenClassrooms\CodeGenerator\Tests\Mediators\MediatorFileObjectTestCase;
use PHPUnit\Framework\TestCase;

class GenericUseCaseRequestMediatorImplTest extends TestCase
{
    use MediatorFileObjectTestCase;

    public const DOMAIN           = 'Domain\SubDomain';

    public const GENERIC_USE_CASE = 'GenericUseCase';

    private GenericUseCaseRequestMediator $mediator;

    private array $options;

    /**
     * @test
     */
    public function generateGenericUseCaseRequest_withDump(): void
    {
        $this->options[Options::DUMP] = null;
        $fileObjects = $this->mediator->mediate(
            [
                Args::DOMAIN   => self::DOMAIN,
                Args::USE_CASE => self::GENERIC_USE_CASE,
            ],
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
    public function generateGenericUseCaseRequest_withoutOptions(): void
    {
        $fileObjects = $this->mediator->mediate(
            [
                Args::DOMAIN   => self::DOMAIN,
                Args::USE_CASE => self::GENERIC_USE_CASE,
            ],
            $this->options
        );

        $this->assertFlushedFileObject($fileObjects);
    }

    /**
     * @test
     */
    public function generateGenericUseCaseRequest_withoutTest(): void
    {
        $this->options[Options::NO_TEST] = null;
        $fileObjects = $this->mediator->mediate(
            [
                Args::DOMAIN   => self::DOMAIN,
                Args::USE_CASE => self::GENERIC_USE_CASE,
            ],
            $this->options
        );

        $this->assertFlushedFileObject($fileObjects);
    }

    protected function setUp(): void
    {
        InMemoryFileObjectGateway::$fileObjects = [];
        $this->mediator = new GenericUseCaseRequestMediatorImpl();
        $this->mediator->setFileObjectGateway(new InMemoryFileObjectGateway());

        $this->options = [
            Options::DUMP       => false,
            Options::NO_TEST    => false,
            Options::TESTS_ONLY => false,
        ];

        $this->mediator->setGenericUseCaseRequestGenerator(
            new GeneratorMock(GenericUseCaseRequestGenerator::class, new GenericUseCaseRequestFileObjectStub1())
        );
        $this->mediator->setGenericUseCaseRequestGeneratorRequestBuilder(
            new GenericUseCaseRequestGeneratorRequestBuilderImpl()
        );
    }
}
