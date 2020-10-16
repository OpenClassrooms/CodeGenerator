<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelAssemblerTraitGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelDetailAssemblerGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelDetailAssemblerImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelDetailGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelDetailImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelListItemAssemblerGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelListItemAssemblerImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelListItemGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelListItemImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelAssemblerTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelDetailAssemblerGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelDetailAssemblerImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelDetailGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelDetailImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelListItemAssemblerGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelListItemAssemblerImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelListItemGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelListItemImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\Entity\DTO\Request\EntityImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\App\Entity\EntityImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request\ViewModelDetailAssemblerImplTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request\ViewModelListItemAssemblerImplTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\ViewModelDetailAssemblerImplTestGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\ViewModelListItemAssemblerImplTestGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\DTO\Request\EntityStubGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\EntityStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\DTO\Request\UseCaseDetailResponseStubGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\DTO\Request\UseCaseListItemResponseStubGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\UseCaseDetailResponseStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\UseCaseListItemResponseStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\DTO\Request\ViewModelDetailStubGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\DTO\Request\ViewModelDetailTestCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\DTO\Request\ViewModelListItemStubGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\DTO\Request\ViewModelListItemTestCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\DTO\Request\ViewModelTestCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\ViewModelDetailStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\ViewModelDetailTestCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\ViewModelListItemStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\ViewModelListItemTestCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\ViewModelTestCaseGenerator;
use OpenClassrooms\CodeGenerator\Mediators\Api\ViewModels\Impl\ViewModelMediatorImpl;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModel\ViewModelFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelAssemblerTrait\ViewModelAssemblerTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelDetail\ViewModelDetailFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelDetailAssembler\ViewModelDetailAssemblerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelDetailAssemblerImpl\ViewModelDetailAssemblerImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelDetailImpl\ViewModelDetailImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelDetailStub\ViewModelDetailStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelDetailTestCase\ViewModelDetailTestCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelListItem\ViewModelListItemFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelListItemAssembler\ViewModelListItemAssemblerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelListItemAssemblerImpl\ViewModelListItemAssemblerImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelListItemImpl\ViewModelListItemImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelListItemStub\ViewModelListItemStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelListItemTestCase\ViewModelListItemTestCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelTestCase\ViewModelTestCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\App\Entity\EntityImpl\EntityImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Api\ViewModels\ViewModelDetailAssemblerImplTest\ViewModelDetailAssemblerImplTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Api\ViewModels\ViewModelListItemAssemblerImplTest\ViewModelListItemAssemblerImplTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Entities\EntityStub\EntityStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Responders\UseCaseDetailResponseStub\UseCaseDetailResponseStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Responders\UseCaseListItemResponseStub\UseCaseListItemResponseStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Generator\GeneratorMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use OpenClassrooms\CodeGenerator\Tests\Mediators\MediatorFileObjectTestCase;
use PHPUnit\Framework\TestCase;

class ViewModelMediatorImplTest extends TestCase
{
    use MediatorFileObjectTestCase;

    /**
     * @var ViewModelMediatorImpl
     */
    private $mediator;

    /**
     * @var array
     */
    private $options;

    /**
     * @test
     */
    public function generateViewModelWithDump(): void
    {
        $this->options[Options::DUMP] = null;
        $fileObjects = $this->mediator->mediate(
            [Args::CLASS_NAME => FunctionalEntityResponse::class],
            $this->options
        );

        $this->assertNotFlushedFileObject($fileObjects);
    }

    /**
     * @test
     */
    public function generateViewModelWithoutOptions(): void
    {
        $fileObjects = $this->mediator->mediate(
            [Args::CLASS_NAME => FunctionalEntityResponse::class],
            $this->options

        );

        $this->assertFlushedFileObject($fileObjects);
    }

    /**
     * @test
     */
    public function generateViewModelWithoutTest(): void
    {
        $this->options[Options::NO_TEST] = null;
        $fileObjects = $this->mediator->mediate(
            [Args::CLASS_NAME => FunctionalEntityResponse::class],
            $this->options
        );

        $this->assertFlushedFileObject($fileObjects);
    }

    /**
     * @test
     */
    public function generateViewModelWithTestOnly(): void
    {
        $this->options[Options::TESTS_ONLY] = null;
        $fileObjects = $this->mediator->mediate(
            [Args::CLASS_NAME => FunctionalEntityResponse::class],
            $this->options
        );

        $this->assertFlushedFileObject($fileObjects);
    }

    /**
     * @test
     */
    public function generateViewModelWithoutDetail(): void
    {
        $this->mediator->setUseCaseResponseFileObjectFactory(new UseCaseResponseFileObjectFactoryMock(false, true));
        $fileObjects = $this->mediator->mediate(
            [Args::CLASS_NAME => FunctionalEntityResponse::class],
            $this->options
        );

        foreach ($fileObjects as $fileObject) {
            $this->assertNotContains('Detail', $fileObject->getClassName());
        }
        $this->assertFlushedFileObject($fileObjects);
    }

    /**
     * @test
     */
    public function generateViewModelWithoutListItem(): void
    {
        $this->mediator->setUseCaseResponseFileObjectFactory(new UseCaseResponseFileObjectFactoryMock(true, false));
        $fileObjects = $this->mediator->mediate(
            [Args::CLASS_NAME => FunctionalEntityResponse::class],
            $this->options
        );

        foreach ($fileObjects as $fileObject) {
            $this->assertNotContains('ListItem', $fileObject->getClassName());
        }
        $this->assertFlushedFileObject($fileObjects);
    }

    protected function setUp(): void
    {
        InMemoryFileObjectGateway::$fileObjects = [];
        $this->mediator = new ViewModelMediatorImpl();
        $this->mediator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->mediator->setUseCaseResponseFileObjectFactory(new UseCaseResponseFileObjectFactoryMock());

        $this->options = [
            Options::DUMP       => false,
            Options::NO_TEST    => false,
            Options::TESTS_ONLY => false,
        ];

        $this->mockGenerators();
        $this->mockRequestBuilder();
    }

    private function mockGenerators(): void
    {
        $this->mediator->setViewModelDetailGenerator(
            new GeneratorMock(ViewModelDetailGenerator::class, new ViewModelDetailStubFileObjectStub1())
        );
        $this->mediator->setEntityStubGenerator(
            new GeneratorMock(EntityStubGenerator::class, new EntityStubFileObjectStub1())
        );
        $this->mediator->setUseCaseDetailResponseStubGenerator(
            new GeneratorMock(UseCaseDetailResponseStubGenerator::class, new UseCaseDetailResponseStubFileObjectStub1())
        );
        $this->mediator->setUseCaseListItemResponseStubGenerator(
            new GeneratorMock(
                UseCaseListItemResponseStubGenerator::class,
                new UseCaseListItemResponseStubFileObjectStub1()
            )
        );
        $this->mediator->setViewModelDetailAssemblerImplTestGenerator(
            new GeneratorMock(
                ViewModelDetailAssemblerImplTestGenerator::class,
                new ViewModelDetailAssemblerImplTestFileObjectStub1()
            )
        );
        $this->mediator->setViewModelDetailGenerator(
            new GeneratorMock(ViewModelDetailGenerator::class, new ViewModelDetailFileObjectStub1())
        );
        $this->mediator->setViewModelDetailImplGenerator(
            new GeneratorMock(ViewModelDetailImplGenerator::class, new ViewModelDetailImplFileObjectStub1())
        );
        $this->mediator->setViewModelDetailStubGenerator(
            new GeneratorMock(ViewModelDetailStubGenerator::class, new ViewModelDetailStubFileObjectStub1())
        );
        $this->mediator->setViewModelDetailTestCaseGenerator(
            new GeneratorMock(ViewModelDetailTestCaseGenerator::class, new ViewModelDetailTestCaseFileObjectStub1())
        );
        $this->mediator->setViewModelGenerator(
            new GeneratorMock(ViewModelGenerator::class, new ViewModelFileObjectStub1())
        );
        $this->mediator->setViewModelTestCaseGenerator(
            new GeneratorMock(ViewModelTestCaseGenerator::class, new ViewModelTestCaseFileObjectStub1())
        );
        $this->mediator->setViewModelListItemAssemblerImplTestGenerator(
            new GeneratorMock(
                ViewModelListItemAssemblerImplTestGenerator::class,
                new ViewModelListItemAssemblerImplTestFileObjectStub1()
            )
        );
        $this->mediator->setViewModelListItemGenerator(
            new GeneratorMock(ViewModelListItemGenerator::class, new ViewModelListItemFileObjectStub1())
        );
        $this->mediator->setViewModelListItemImplGenerator(
            new GeneratorMock(ViewModelListItemImplGenerator::class, new ViewModelListItemImplFileObjectStub1())
        );
        $this->mediator->setViewModelListItemStubGenerator(
            new GeneratorMock(ViewModelListItemStubGenerator::class, new ViewModelListItemStubFileObjectStub1())
        );
        $this->mediator->setViewModelListItemTestCaseGenerator(
            new GeneratorMock(ViewModelListItemTestCaseGenerator::class, new ViewModelListItemTestCaseFileObjectStub1())
        );

        $this->mediator->setViewModelAssemblerTraitGenerator(
            new GeneratorMock(ViewModelAssemblerTraitGenerator::class, new ViewModelAssemblerTraitFileObjectStub1())
        );
        $this->mediator->setViewModelDetailAssemblerGenerator(
            new GeneratorMock(ViewModelDetailAssemblerGenerator::class, new  ViewModelDetailAssemblerFileObjectStub1())
        );
        $this->mediator->setViewModelListItemAssemblerGenerator(
            new GeneratorMock(
                ViewModelListItemAssemblerGenerator::class,
                new  ViewModelListItemAssemblerFileObjectStub1()
            )
        );
        $this->mediator->setEntityImplGenerator(
            new GeneratorMock(EntityImplGenerator::class, new  EntityImplFileObjectStub1())
        );
    }

    private function mockRequestBuilder(): void
    {
        $this->mediator->setEntityStubGeneratorRequestBuilder(new EntityStubGeneratorRequestBuilderImpl());
        $this->mediator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->mediator->setUseCaseDetailResponseStubGeneratorRequestBuilder(
            new UseCaseDetailResponseStubGeneratorRequestBuilderImpl()
        );
        $this->mediator->setUseCaseListItemResponseStubGeneratorRequestBuilder(
            new UseCaseListItemResponseStubGeneratorRequestBuilderImpl()
        );
        $this->mediator->setViewModelDetailAssemblerImplTestGeneratorRequestBuilder(
            new ViewModelDetailAssemblerImplTestGeneratorRequestBuilderImpl()
        );
        $this->mediator->setViewModelDetailGeneratorRequestBuilder(new ViewModelDetailGeneratorRequestBuilderImpl());
        $this->mediator->setViewModelDetailImplGeneratorRequestBuilder(
            new ViewModelDetailImplGeneratorRequestBuilderImpl()
        );
        $this->mediator->setViewModelDetailStubGeneratorRequestBuilder(
            new ViewModelDetailStubGeneratorRequestBuilderImpl()
        );
        $this->mediator->setViewModelDetailTestCaseGeneratorRequestBuilder(
            new ViewModelDetailTestCaseGeneratorRequestBuilderImpl()
        );
        $this->mediator->setViewModelGeneratorRequestBuilder(new ViewModelGeneratorRequestBuilderImpl());
        $this->mediator->setViewModelTestCaseGeneratorRequestBuilder(
            new ViewModelTestCaseGeneratorRequestBuilderImpl()
        );
        $this->mediator->setViewModelListItemAssemblerImplTestGeneratorRequestBuilder(
            new ViewModelListItemAssemblerImplTestGeneratorRequestBuilderImpl()
        );
        $this->mediator->setViewModelListItemGeneratorRequestBuilder(
            new ViewModelListItemGeneratorRequestBuilderImpl()
        );
        $this->mediator->setViewModelListItemImplGeneratorRequestBuilder(
            new ViewModelListItemImplGeneratorRequestBuilderImpl()
        );
        $this->mediator->setViewModelListItemStubGeneratorRequestBuilder(
            new ViewModelListItemStubGeneratorRequestBuilderImpl()
        );
        $this->mediator->setViewModelListItemTestCaseGeneratorRequestBuilder(
            new ViewModelListItemTestCaseGeneratorRequestBuilderImpl()
        );

        $this->mediator->setViewModelAssemblerTraitGeneratorRequestBuilder(
            new ViewModelAssemblerTraitGeneratorRequestBuilderImpl()
        );
        $this->mediator->setViewModelDetailAssemblerGeneratorRequestBuilder(
            new ViewModelDetailAssemblerGeneratorRequestBuilderImpl()
        );
        $this->mediator->setViewModelListItemAssemblerGeneratorRequestBuilder(
            new ViewModelListItemAssemblerGeneratorRequestBuilderImpl()
        );
        $this->mediator->setEntityImplGeneratorRequestBuilder(
            new EntityImplGeneratorRequestBuilderImpl()
        );
    }
}
