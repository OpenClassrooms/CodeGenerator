<?php declare(strict_types=1);

namespace Tests\FileObjects;

use OpenClassrooms\CodeGenerator\FileObjects\AbstractFileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\Impl\ViewModelFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use OpenClassrooms\CodeGenerator\Utility\ClassNameUtility;
use PHPUnit\Framework\TestCase;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelFileObjectFactoryImplTest extends TestCase
{
    use ClassNameUtility;

    const BASE_NAMESPACE = '';

    const STUB_NAMESPACE = self::TEST_BASE_NAMESPACE . 'Doubles\\';

    const TEST_BASE_NAMESPACE = 'Test\Base\Namespace\\';

    /**
     * @var string
     */
    private $domain;

    /**
     * @var string
     */
    private $entity;

    /**
     * @var AbstractFileObjectFactory
     */
    private $factory;

    /**
     * @test
     * @dataProvider fileObjectDataProvider
     */
    public function create_ReturnFileObject(string $inputType, string $domain, string $entity, FileObject $expected)
    {
        $actual = $this->factory->create($inputType, $domain, $entity);
        $this->assertSame($expected->getClassName(), $actual->getClassName());
    }

    public function fileObjectDataProvider()
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName(FunctionalEntity::class);

        return [
            [
                ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER,
                $domain,
                $entity,
                self::getFileObjectViewModelDetailAssembler(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_IMPL,
                $domain,
                $entity,
                self::getFileObjectViewModelDetailAssemblerImpl(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_IMPL_TEST,
                $domain,
                $entity,
                self::getFileObjectViewModelDetailAssemblerImplTest(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER,
                $domain,
                $entity,
                self::getFileObjectViewModelListItemAssembler(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL,
                $domain,
                $entity,
                self::getFileObjectViewModelListItemAssemblerImpl(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL_TEST,
                $domain,
                $entity,
                self::getFileObjectViewModelListItemAssemblerImplTest(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL,
                $domain,
                $entity,
                self::getFileObjectViewModel(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_DETAIL,
                $domain,
                $entity,
                self::getFileObjectViewModelDetail(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM,
                $domain,
                $entity,
                self::getFileObjectViewModelListItem(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_STUB,
                $domain,
                $entity,
                self::getFileObjectViewModelDetailStub(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_STUB,
                $domain,
                $entity,
                self::getFileObjectViewModelListItemStub(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_TEST_CASE,
                $domain,
                $entity,
                self::getFileObjectViewModelTestCase(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_TEST_CASE,
                $domain,
                $entity,
                self::getFileObjectViewModelListItemTestCase(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_IMPL,
                $domain,
                $entity,
                self::getFileObjectViewModelListItemImpl(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_IMPL,
                $domain,
                $entity,
                self::getFileObjectViewModelDetailImpl(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_TEST_CASE,
                $domain,
                $entity,
                self::getFileObjectViewModelDetailTestCase(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_IMPL,
                $domain,
                $entity,
                self::getFileObjectViewModelImpl(),
            ],
        ];
    }

    private static function getEntityName(): string
    {
        return TestClassUtil::getShortClassName(FunctionalEntity::class);
    }

    private static function getFileObjectViewModelDetailAssembler(): FileObject
    {
        $fileObjectViewModelAssembler = new FileObject();
        TestClassUtil::setProperty(
            'className',
            'Api\ViewModels\Domain\SubDomain\\' . self::getEntityName() . 'DetailAssembler',
            $fileObjectViewModelAssembler
        );

        return $fileObjectViewModelAssembler;
    }


    private static function getFileObjectViewModelDetailAssemblerImpl(): FileObject
    {
        $fileObjectViewModelAssemblerImpl = new FileObject();
        TestClassUtil::setProperty(
            'className',
            'Api\ViewModels\Domain\SubDomain\Impl\\' . self::getEntityName() . 'DetailAssemblerImpl',
            $fileObjectViewModelAssemblerImpl
        );

        return $fileObjectViewModelAssemblerImpl;
    }

    private static function getFileObjectViewModelDetailAssemblerImplTest(): FileObject
    {
        $fileObjectViewModelAssemblerTest = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::TEST_BASE_NAMESPACE . 'Api\ViewModels\Domain\SubDomain\Impl\\' . self::getEntityName() . 'DetailAssemblerImplTest',
            $fileObjectViewModelAssemblerTest
        );

        return $fileObjectViewModelAssemblerTest;
    }

    private static function getFileObjectViewModelListItemAssembler(): FileObject
    {
        $fileObjectViewModelAssembler = new FileObject();
        TestClassUtil::setProperty(
            'className',
            'Api\ViewModels\Domain\SubDomain\\' . self::getEntityName() . 'ListItemAssembler',
            $fileObjectViewModelAssembler
        );

        return $fileObjectViewModelAssembler;
    }


    private static function getFileObjectViewModelListItemAssemblerImpl(): FileObject
    {
        $fileObjectViewModelAssemblerImpl = new FileObject();
        TestClassUtil::setProperty(
            'className',
            'Api\ViewModels\Domain\SubDomain\Impl\\' . self::getEntityName() . 'ListItemAssemblerImpl',
            $fileObjectViewModelAssemblerImpl
        );

        return $fileObjectViewModelAssemblerImpl;
    }

    private static function getFileObjectViewModelListItemAssemblerImplTest(): FileObject
    {
        $fileObjectViewModelAssemblerTest = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::TEST_BASE_NAMESPACE . 'Api\ViewModels\Domain\SubDomain\Impl\\' . self::getEntityName() . 'ListItemAssemblerImplTest',
            $fileObjectViewModelAssemblerTest
        );

        return $fileObjectViewModelAssemblerTest;
    }

    private static function getFileObjectViewModel(): FileObject
    {
        $fileObjectViewModel = new FileObject();
        TestClassUtil::setProperty(
            'className',
            'Api\ViewModels\Domain\SubDomain\\' . self::getEntityName(),
            $fileObjectViewModel
        );

        return $fileObjectViewModel;
    }

    private static function getFileObjectViewModelDetail()
    {
        $fileObjectViewModelDetail = new FileObject();
        TestClassUtil::setProperty(
            'className',
            'Api\ViewModels\Domain\SubDomain\\' . self::getEntityName() . 'Detail',
            $fileObjectViewModelDetail
        );

        return $fileObjectViewModelDetail;
    }

    private static function getFileObjectViewModelListItem(): FileObject
    {
        $fileObjectViewModelListItem = new FileObject();
        TestClassUtil::setProperty(
            'className',
            'Api\ViewModels\Domain\SubDomain\\' . self::getEntityName() . 'ListItem',
            $fileObjectViewModelListItem
        );

        return $fileObjectViewModelListItem;
    }

    private static function getFileObjectViewModelDetailStub(): FileObject
    {
        $fileObjectViewModelDetailStub = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::STUB_NAMESPACE . 'Api\ViewModels\Domain\SubDomain\\' . self::getEntityName() . 'DetailStub1',
            $fileObjectViewModelDetailStub
        );

        return $fileObjectViewModelDetailStub;
    }

    private static function getFileObjectViewModelListItemStub(): FileObject
    {
        $fileObjectViewModelListItemStub = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::STUB_NAMESPACE . 'Api\ViewModels\Domain\SubDomain\\' . self::getEntityName() . 'ListItemStub1',
            $fileObjectViewModelListItemStub
        );

        return $fileObjectViewModelListItemStub;
    }

    private static function getFileObjectViewModelTestCase(): FileObject
    {
        $fileObjectViewModelTestCase = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::STUB_NAMESPACE . 'Api\ViewModels\Domain\SubDomain\\' . self::getEntityName() . 'TestCase',
            $fileObjectViewModelTestCase
        );

        return $fileObjectViewModelTestCase;
    }

    private static function getFileObjectViewModelListItemTestCase(): FileObject
    {
        $fileObjectViewModelListItemTestCase = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::STUB_NAMESPACE . 'Api\ViewModels\Domain\SubDomain\\' . self::getEntityName() . 'ListItemTestCase',
            $fileObjectViewModelListItemTestCase
        );

        return $fileObjectViewModelListItemTestCase;
    }

    private static function getFileObjectViewModelListItemImpl(): FileObject
    {
        $fileObjectViewModelListItemImpl = new FileObject();
        TestClassUtil::setProperty(
            'className',
            'Api\ViewModels\Domain\SubDomain\Impl\\' . self::getEntityName() . 'ListItemImpl',
            $fileObjectViewModelListItemImpl
        );

        return $fileObjectViewModelListItemImpl;
    }

    private static function getFileObjectViewModelDetailImpl(): FileObject
    {
        $fileObjectViewModelDetailImpl = new FileObject();
        TestClassUtil::setProperty(
            'className',
            'Api\ViewModels\Domain\SubDomain\Impl\\' . self::getEntityName() . 'DetailImpl',
            $fileObjectViewModelDetailImpl
        );

        return $fileObjectViewModelDetailImpl;
    }

    private static function getFileObjectViewModelDetailTestCase(): FileObject
    {
        $fileObjectViewModelDetailTestCase = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::STUB_NAMESPACE . 'Api\ViewModels\Domain\SubDomain\\' . self::getEntityName() . 'DetailTestCase',
            $fileObjectViewModelDetailTestCase
        );

        return $fileObjectViewModelDetailTestCase;
    }

    private static function getFileObjectViewModelImpl(): FileObject
    {
        $fileObjectViewModelImpl = new FileObject();
        TestClassUtil::setProperty(
            'className',
            'Api\ViewModels\Domain\SubDomain\Impl\\' . self::getEntityName() . 'Impl',
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
        $this->factory = new ViewModelFileObjectFactoryImpl();
        $this->factory->setBaseNamespace(self::BASE_NAMESPACE);
        $this->factory->setTestsBaseNamespace(self::TEST_BASE_NAMESPACE);
        $this->factory->setStubNamespace(self::STUB_NAMESPACE);
    }
}
