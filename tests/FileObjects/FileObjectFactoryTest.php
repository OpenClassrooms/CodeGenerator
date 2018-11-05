<?php

namespace Tests\FileObjects;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\FileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\FileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\Impl\FileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\TestCase;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class FileObjectFactoryTest extends TestCase
{
    const BASE_NAMESPACE = '';

    const TEST_BASE_NAMESPACE = 'Test\Base\Namespace\\';

    const STUB_NAMESPACE = 'Test\Doubles\\';

    /**
     * @var FileObjectFactory
     */
    private $factory;

    public static function fileObjectDataProvider()
    {
        return [
            [
                FileObjectType::API_VIEW_MODEL_ASSEMBLER,
                FunctionalEntity::class,
                self::getFileObjectViewModelAssembler()
            ],
            [
                FileObjectType::API_VIEW_MODEL_ASSEMBLER_TEST,
                FunctionalEntity::class,
                self::getFileObjectViewModelAssemblerTest()
            ],
            [
                FileObjectType::API_VIEW_MODEL,
                FunctionalEntity::class,
                self::getFileObjectViewModel()
            ],
            [
                FileObjectType::API_VIEW_MODEL_DETAIL,
                FunctionalEntity::class,
                self::getFileObjectViewModelDetail()
            ],
            [
                FileObjectType::API_VIEW_MODEL_LIST_ITEM,
                FunctionalEntity::class,
                self::getFileObjectViewModelListItem()
            ],
            [
                FileObjectType::API_VIEW_MODEL_STUB,
                FunctionalEntity::class,
                self::getFileObjectViewModelStub()
            ],
            [
                FileObjectType::API_VIEW_MODEL_TEST_CASE,
                FunctionalEntity::class,
                self::getFileObjectViewModelTestCase()
            ],
            [
                FileObjectType::API_VIEW_MODEL_LIST_ITEM_IMPL,
                FunctionalEntity::class,
                self::getFileObjectViewModelListItemImpl()
            ],
            [
                FileObjectType::API_VIEW_MODEL_DETAIL_IMPL,
                FunctionalEntity::class,
                self::getFileObjectViewModelDetailImpl()
            ],
            [
                FileObjectType::API_VIEW_MODEL_ASSEMBLER_IMPL,
                FunctionalEntity::class,
                self::getFileObjectViewModelAssemblerImpl()
            ]
        ];
    }

    private static function getFileObjectViewModelAssembler(): FileObject
    {
        $fileObjectViewModelAssembler = new FileObject();
        TestClassUtil::setProperty(
            'className',
            'ViewModels\Domain\SubDomain\\' . self::getShortClassName(FunctionalEntity::class) . 'Assembler',
            $fileObjectViewModelAssembler
        );

        return $fileObjectViewModelAssembler;
    }

    private static function getFileObjectViewModelAssemblerTest(): FileObject
    {
        $fileObjectViewModelAssemblerTest = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::TEST_BASE_NAMESPACE . 'ViewModels\Domain\SubDomain\\' . self::getShortClassName(
                FunctionalEntity::class
            ) . 'AssemblerTest',
            $fileObjectViewModelAssemblerTest
        );

        return $fileObjectViewModelAssemblerTest;
    }

    private static function getFileObjectViewModelDetail()
    {
        $fileObjectViewModelDetail = new FileObject();
        TestClassUtil::setProperty(
            'className',
            'ViewModels\Domain\SubDomain\\' . self::getShortClassName(FunctionalEntity::class) . 'Detail',
            $fileObjectViewModelDetail
        );

        return $fileObjectViewModelDetail;
    }

    private static function getFileObjectViewModel(): FileObject
    {
        $fileObjectViewModel = new FileObject();
        TestClassUtil::setProperty(
            'className',
            'ViewModels\Domain\SubDomain\\' . self::getShortClassName(FunctionalEntity::class),
            $fileObjectViewModel
        );

        return $fileObjectViewModel;
    }

    private static function getFileObjectViewModelListItem(): FileObject
    {
        $fileObjectViewModelListItem = new FileObject();
        TestClassUtil::setProperty(
            'className',
            'ViewModels\Domain\SubDomain\\' . self::getShortClassName(FunctionalEntity::class) . 'ListItem',
            $fileObjectViewModelListItem
        );

        return $fileObjectViewModelListItem;
    }

    private static function getFileObjectViewModelStub(): FileObject
    {
        $fileObjectViewModelStub = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::STUB_NAMESPACE.'Domain\SubDomain\\' . self::getShortClassName(
                FunctionalEntity::class
            ) . 'Stub',
            $fileObjectViewModelStub
        );

        return $fileObjectViewModelStub;
    }

    private static function getFileObjectViewModelTestCase(): FileObject
    {
        $fileObjectViewModelTestCase = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::TEST_BASE_NAMESPACE.'ViewModels\Domain\SubDomain\\' . self::getShortClassName(
                FunctionalEntity::class
            ) . 'TestCase',
            $fileObjectViewModelTestCase
        );

        return $fileObjectViewModelTestCase;
    }

    private static function getFileObjectViewModelAssemblerImpl(): FileObject
    {
        $fileObjectViewModelAssemblerImpl = new FileObject();
        TestClassUtil::setProperty(
            'className',
            'ViewModels\Domain\SubDomain\Impl\\' . self::getShortClassName(
                FunctionalEntity::class
            ) . 'AssemblerImpl',
            $fileObjectViewModelAssemblerImpl
        );

        return $fileObjectViewModelAssemblerImpl;
    }

    private static function getFileObjectViewModelListItemImpl(): FileObject
    {
        $fileObjectViewModelListItemImpl = new FileObject();
        TestClassUtil::setProperty(
            'className',
            'ViewModels\Domain\SubDomain\Impl\\' . self::getShortClassName(
                FunctionalEntity::class
            ) . 'ListItemImpl',
            $fileObjectViewModelListItemImpl
        );

        return $fileObjectViewModelListItemImpl;
    }

    private static function getFileObjectViewModelDetailImpl(): FileObject
    {
        $fileObjectViewModelDetailImpl = new FileObject();
        TestClassUtil::setProperty(
            'className',
            'ViewModels\Domain\SubDomain\Impl\\' . self::getShortClassName(
                FunctionalEntity::class
            ) . 'DetailImpl',
            $fileObjectViewModelDetailImpl
        );

        return $fileObjectViewModelDetailImpl;
    }

    private static function getShortClassName(string $className)
    {
        $rc = new \ReflectionClass($className);

        return $rc->getShortName();
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function InvalidTye_Create_ThrowException()
    {
        $this->factory->create('INVALID_TYPE', self::class);
    }

    /**
     * @test
     * @dataProvider fileObjectDataProvider
     */
    public function create_ReturnFileObject(string $inputType, string $inputClassName, FileObject $expected)
    {
        $actual = $this->factory->create($inputType, $inputClassName);
        $this->assertSame($expected->getClassName(), $actual->getClassName());
    }

    protected function setUp()
    {
        $this->factory = new FileObjectFactoryImpl();
        $this->factory->setBaseNamespace(self::BASE_NAMESPACE);
        $this->factory->setTestsBaseNamespace(self::TEST_BASE_NAMESPACE);
        $this->factory->setStubNamespace(self::STUB_NAMESPACE);
    }
}
