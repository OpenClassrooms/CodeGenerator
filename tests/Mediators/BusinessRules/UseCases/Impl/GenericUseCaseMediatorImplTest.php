<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GenericUseCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GenericUseCaseRequestBuilderImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GenericUseCaseRequestDTOGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GenericUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GenericUseCaseRequestBuilderImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GenericUseCaseRequestDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request\GenericUseCaseTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\GenericUseCaseTestGenerator;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\GenericUseCaseMediator;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl\GenericUseCaseMediatorImpl;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GenericUseCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GenericUseCaseRequestBuilderImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GenericUseCaseRequestDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\UseCases\GenericUseCaseTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Generator\GeneratorMock;
use OpenClassrooms\CodeGenerator\Tests\Mediators\MediatorFileObjectTestCase;
use PHPUnit\Framework\TestCase;

class GenericUseCaseMediatorImplTest extends TestCase
{
    use MediatorFileObjectTestCase;

    const DOMAIN           = 'Domain\SubDomain';

    const GENERIC_USE_CASE = 'GenericUseCase';

    /**
     * @var GenericUseCaseMediator
     */
    private $mediator;

    /**
     * @var array
     */
    private $options;

    /**
     * @test
     */
    public function generateGenericUseCase_withDump(): void
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
    public function generateGenericUseCase_withoutOptions(): void
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
    public function generateGenericUseCase_withoutTest(): void
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

    /**
     * @test
     */
    public function generateGenericUseCase_withTestOnly(): void
    {
        $this->options[Options::TESTS_ONLY] = null;
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
        $this->mediator = new GenericUseCaseMediatorImpl();
        $this->mediator->setFileObjectGateway(new InMemoryFileObjectGateway());

        $this->options = [
            Options::DUMP       => false,
            Options::NO_TEST    => false,
            Options::TESTS_ONLY => false,
        ];

        $this->mediator->setGenericUseCaseGenerator(
            new GeneratorMock(
                GenericUseCaseGenerator::class,
                new GenericUseCaseFileObjectStub1()
            )
        );
        $this->mediator->setGenericUseCaseGeneratorRequestBuilder(
            new GenericUseCaseGeneratorRequestBuilderImpl()
        );
        $this->mediator->setGenericUseCaseRequestBuilderImplGenerator(
            new GeneratorMock(
                GenericUseCaseRequestBuilderImplGenerator::class,
                new GenericUseCaseRequestBuilderImplFileObjectStub1()
            )
        );
        $this->mediator->setGenericUseCaseRequestBuilderImplGeneratorRequestBuilder(
            new GenericUseCaseRequestBuilderImplGeneratorRequestBuilderImpl()
        );
        $this->mediator->setGenericUseCaseRequestDTOGenerator(
            new GeneratorMock(
                GenericUseCaseRequestDTOGenerator::class,
                new GenericUseCaseRequestDTOFileObjectStub1()
            )
        );
        $this->mediator->setGenericUseCaseTestGenerator(
            new GeneratorMock(
                GenericUseCaseTestGenerator::class,
                new GenericUseCaseTestFileObjectStub1()
            )
        );
        $this->mediator->setGenericUseCaseTestGeneratorRequestBuilder(
            new GenericUseCaseTestGeneratorRequestBuilderImpl()
        );
        $this->mediator->setGenericUseCaseRequestDTOGeneratorRequestBuilder(
            new GenericUseCaseRequestDTOGeneratorRequestBuilderImpl()
        );
    }
}
