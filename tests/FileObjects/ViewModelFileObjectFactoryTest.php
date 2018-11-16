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
class ViewModelFileObjectFactoryTest extends TestCase
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
                ViewModelFileObjectType::API_VIEW_MODEL_ASSEMBLER,
                $domain,
                $entity,
                self::getFileObjectViewModelAssembler(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_ASSEMBLER_TEST,
                $domain,
                $entity,
                self::getFileObjectViewModelAssemblerTest(),
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
                self::getFileObjectViewModelStub(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_TEST_CASE,
                $domain,
                $entity,
                self::getFileObjectViewModelTestCase(),
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
                ViewModelFileObjectType::API_VIEW_MODEL_ASSEMBLER_IMPL,
                $domain,
                $entity,
                self::getFileObjectViewModelAssemblerImpl(),
            ],
        ];
    }

    private static function getEntityName(): string
    {
        return TestClassUtil::getShortClassName(FunctionalEntity::class);
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

    private static function getFileObjectViewModelAssembler(): FileObject
    {
        $fileObjectViewModelAssembler = new FileObject();
        TestClassUtil::setProperty(
            'className',
            'Api\ViewModels\Domain\SubDomain\\' . self::getEntityName() . 'Assembler',
            $fileObjectViewModelAssembler
        );

        return $fileObjectViewModelAssembler;
    }

    private static function getFileObjectViewModelAssemblerImpl(): FileObject
    {
        $fileObjectViewModelAssemblerImpl = new FileObject();
        TestClassUtil::setProperty(
            'className',
            'Api\ViewModels\Domain\SubDomain\Impl\\' . self::getEntityName() . 'AssemblerImpl',
            $fileObjectViewModelAssemblerImpl
        );

        return $fileObjectViewModelAssemblerImpl;
    }

    private static function getFileObjectViewModelAssemblerTest(): FileObject
    {
        $fileObjectViewModelAssemblerTest = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::TEST_BASE_NAMESPACE . 'Api\ViewModels\Domain\SubDomain\\' . self::getEntityName() . 'AssemblerTest',
            $fileObjectViewModelAssemblerTest
        );

        return $fileObjectViewModelAssemblerTest;
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

    private static function getFileObjectViewModelStub(): FileObject
    {
        $fileObjectViewModelStub = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::STUB_NAMESPACE . 'Api\ViewModels\Domain\SubDomain\\' . self::getEntityName() . 'DetailStub1',
            $fileObjectViewModelStub
        );

        return $fileObjectViewModelStub;
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
