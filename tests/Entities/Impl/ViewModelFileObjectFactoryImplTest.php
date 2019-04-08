<?php declare(strict_types=1);

namespace Tests\FileObjects;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\ViewModelFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ViewModelFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use PHPUnit\Framework\TestCase;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelFileObjectFactoryImplTest extends TestCase
{
    const BASE_NAMESPACE = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\\';

    const DIR_NAME = 'Api\\';

    const STUB_NAMESPACE = self::BASE_NAMESPACE . 'tests\Doubles\\';

    const TEST_BASE_NAMESPACE = self::BASE_NAMESPACE . 'Tests\\';

    /**
     * @var ViewModelFileObjectFactory
     */
    private $factory;

    /**
     * @test
     * @dataProvider fileObjectDataProvider
     */
    public function create_ReturnFileObject(
        string $inputType,
        string $domain,
        string $entity,
        string $baseNamespace,
        FileObject $expected
    )
    {
        $actual = $this->factory->create($inputType, $domain, $entity, $baseNamespace);
        $this->assertSame($expected->getClassName(), $actual->getClassName());
    }

    public function fileObjectDataProvider()
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(
            FunctionalEntity::class
        );

        return [
            [
                ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectViewModelDetailAssembler(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_IMPL,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectViewModelDetailAssemblerImpl(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_IMPL_TEST,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectViewModelDetailAssemblerImplTest(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectViewModelListItemAssembler(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectViewModelListItemAssemblerImpl(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL_TEST,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectViewModelListItemAssemblerImplTest(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectViewModel(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_DETAIL,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectViewModelDetail(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectViewModelListItem(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_STUB,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectViewModelDetailStub(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_STUB,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectViewModelListItemStub(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_TEST_CASE,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectViewModelTestCase(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_TEST_CASE,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectViewModelListItemTestCase(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_IMPL,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectViewModelListItemImpl(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_IMPL,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectViewModelDetailImpl(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_TEST_CASE,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectViewModelDetailTestCase(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_IMPL,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectViewModelImpl(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_ASSEMBLER_TRAIT,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectViewModelAssemblerTrait(),
            ],
        ];
    }

    private static function getFileObjectViewModelDetailAssembler(): FileObject
    {
        $fileObjectViewModelAssembler = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::BASE_NAMESPACE . self::DIR_NAME . 'ViewModels\Domain\SubDomain\\' . self::getEntityName(
            ) . 'DetailAssembler',
            $fileObjectViewModelAssembler
        );

        return $fileObjectViewModelAssembler;
    }

    private static function getEntityName(): string
    {
        return TestClassUtil::getShortClassName(FunctionalEntity::class);
    }

    private static function getFileObjectViewModelDetailAssemblerImpl(): FileObject
    {
        $fileObjectViewModelAssemblerImpl = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::BASE_NAMESPACE . self::DIR_NAME . 'ViewModels\Domain\SubDomain\Impl\\' . self::getEntityName(
            ) . 'DetailAssemblerImpl',
            $fileObjectViewModelAssemblerImpl
        );

        return $fileObjectViewModelAssemblerImpl;
    }

    private static function getFileObjectViewModelDetailAssemblerImplTest(): FileObject
    {
        $fileObjectViewModelAssemblerTest = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::TEST_BASE_NAMESPACE . self::DIR_NAME . 'ViewModels\Domain\SubDomain\Impl\\' . self::getEntityName(
            ) . 'DetailAssemblerImplTest',
            $fileObjectViewModelAssemblerTest
        );

        return $fileObjectViewModelAssemblerTest;
    }

    private static function getFileObjectViewModelListItemAssembler(): FileObject
    {
        $fileObjectViewModelAssembler = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::BASE_NAMESPACE . self::DIR_NAME . 'ViewModels\Domain\SubDomain\\' . self::getEntityName(
            ) . 'ListItemAssembler',
            $fileObjectViewModelAssembler
        );

        return $fileObjectViewModelAssembler;
    }

    private static function getFileObjectViewModelListItemAssemblerImpl(): FileObject
    {
        $fileObjectViewModelAssemblerImpl = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::BASE_NAMESPACE . self::DIR_NAME . 'ViewModels\Domain\SubDomain\Impl\\' . self::getEntityName(
            ) . 'ListItemAssemblerImpl',
            $fileObjectViewModelAssemblerImpl
        );

        return $fileObjectViewModelAssemblerImpl;
    }

    private static function getFileObjectViewModelListItemAssemblerImplTest(): FileObject
    {
        $fileObjectViewModelAssemblerTest = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::TEST_BASE_NAMESPACE . self::DIR_NAME . 'ViewModels\Domain\SubDomain\Impl\\' . self::getEntityName(
            ) . 'ListItemAssemblerImplTest',
            $fileObjectViewModelAssemblerTest
        );

        return $fileObjectViewModelAssemblerTest;
    }

    private static function getFileObjectViewModel(): FileObject
    {
        $fileObjectViewModel = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::BASE_NAMESPACE . self::DIR_NAME . 'ViewModels\Domain\SubDomain\\' . self::getEntityName(),
            $fileObjectViewModel
        );

        return $fileObjectViewModel;
    }

    private static function getFileObjectViewModelDetail()
    {
        $fileObjectViewModelDetail = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::BASE_NAMESPACE . self::DIR_NAME . 'ViewModels\Domain\SubDomain\\' . self::getEntityName() . 'Detail',
            $fileObjectViewModelDetail
        );

        return $fileObjectViewModelDetail;
    }

    private static function getFileObjectViewModelListItem(): FileObject
    {
        $fileObjectViewModelListItem = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::BASE_NAMESPACE . self::DIR_NAME . 'ViewModels\Domain\SubDomain\\' . self::getEntityName(
            ) . 'ListItem',
            $fileObjectViewModelListItem
        );

        return $fileObjectViewModelListItem;
    }

    private static function getFileObjectViewModelDetailStub(): FileObject
    {
        $fileObjectViewModelDetailStub = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::STUB_NAMESPACE . self::DIR_NAME . 'ViewModels\Domain\SubDomain\\' . self::getEntityName(
            ) . 'DetailStub1',
            $fileObjectViewModelDetailStub
        );

        return $fileObjectViewModelDetailStub;
    }

    private static function getFileObjectViewModelListItemStub(): FileObject
    {
        $fileObjectViewModelListItemStub = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::STUB_NAMESPACE . self::DIR_NAME . 'ViewModels\Domain\SubDomain\\' . self::getEntityName(
            ) . 'ListItemStub1',
            $fileObjectViewModelListItemStub
        );

        return $fileObjectViewModelListItemStub;
    }

    private static function getFileObjectViewModelTestCase(): FileObject
    {
        $fileObjectViewModelTestCase = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::STUB_NAMESPACE . self::DIR_NAME . 'ViewModels\Domain\SubDomain\\' . self::getEntityName(
            ) . 'TestCase',
            $fileObjectViewModelTestCase
        );

        return $fileObjectViewModelTestCase;
    }

    private static function getFileObjectViewModelListItemTestCase(): FileObject
    {
        $fileObjectViewModelListItemTestCase = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::STUB_NAMESPACE . self::DIR_NAME . 'ViewModels\Domain\SubDomain\\' . self::getEntityName(
            ) . 'ListItemTestCase',
            $fileObjectViewModelListItemTestCase
        );

        return $fileObjectViewModelListItemTestCase;
    }

    private static function getFileObjectViewModelListItemImpl(): FileObject
    {
        $fileObjectViewModelListItemImpl = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::BASE_NAMESPACE . self::DIR_NAME . 'ViewModels\Domain\SubDomain\Impl\\' . self::getEntityName(
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
            self::BASE_NAMESPACE . self::DIR_NAME . 'ViewModels\Domain\SubDomain\Impl\\' . self::getEntityName(
            ) . 'DetailImpl',
            $fileObjectViewModelDetailImpl
        );

        return $fileObjectViewModelDetailImpl;
    }

    private static function getFileObjectViewModelDetailTestCase(): FileObject
    {
        $fileObjectViewModelDetailTestCase = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::STUB_NAMESPACE . self::DIR_NAME . 'ViewModels\Domain\SubDomain\\' . self::getEntityName(
            ) . 'DetailTestCase',
            $fileObjectViewModelDetailTestCase
        );

        return $fileObjectViewModelDetailTestCase;
    }

    private static function getFileObjectViewModelImpl(): FileObject
    {
        $fileObjectViewModelImpl = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::BASE_NAMESPACE . self::DIR_NAME . 'ViewModels\Domain\SubDomain\Impl\\' . self::getEntityName(
            ) . 'Impl',
            $fileObjectViewModelImpl
        );

        return $fileObjectViewModelImpl;
    }

    private static function getFileObjectViewModelAssemblerTrait(): FileObject
    {
        $fileObjectViewModelImpl = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::BASE_NAMESPACE . self::DIR_NAME . 'ViewModels\Domain\SubDomain\\' . self::getEntityName(
            ) . 'AssemblerTrait',
            $fileObjectViewModelImpl
        );

        return $fileObjectViewModelImpl;
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function InvalidTye_Create_ThrowException()
    {
        $this->factory->create('INVALID_TYPE', self::class, '');
    }

    protected function setUp()
    {
        $this->factory = new ViewModelFileObjectFactoryMock();
    }
}