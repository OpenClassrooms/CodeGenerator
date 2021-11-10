<?php

declare(strict_types=1);

namespace Tests\FileObjects;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\ViewModelFileObjectFactory;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ViewModelFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModel;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use PHPUnit\Framework\TestCase;

class ViewModelFileObjectFactoryImplTest extends TestCase
{
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
    ) {
        $actual = $this->factory->create($inputType, $domain, $entity, $baseNamespace);
        $this->assertSame($expected->getClassName(), $actual->getClassName());
    }

    public function fileObjectDataProvider(): array
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
                ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_TEST,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectViewModelDetailAssemblerTest(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectViewModelListItemAssembler(),
            ],
            [
                ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_TEST,
                $domain,
                $entity,
                $baseNamespace,
                self::getFileObjectViewModelListItemAssemblerTest(),
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
        ];
    }

    private static function getFileObjectViewModelDetailAssembler(): FileObject
    {
        return new FileObject(
            FixturesConfig::BASE_NAMESPACE . FixturesConfig::API_DIR . 'ViewModels\Domain\SubDomain\\' . self::getEntityName(
            ) . 'DetailAssembler'
        );
    }

    private static function getEntityName(): string
    {
        return TestClassUtil::getShortClassName(FunctionalEntityViewModel::class);
    }

    private static function getFileObjectViewModelDetailAssemblerTest(): FileObject
    {
        return new FileObject(
            FixturesConfig::TEST_BASE_NAMESPACE . FixturesConfig::API_DIR . 'ViewModels\Domain\SubDomain\\' . self::getEntityName(
            ) . 'DetailAssemblerTest'
        );
    }

    private static function getFileObjectViewModelListItemAssembler(): FileObject
    {
        return new FileObject(
            FixturesConfig::BASE_NAMESPACE . FixturesConfig::API_DIR . 'ViewModels\Domain\SubDomain\\' . self::getEntityName(
            ) . 'ListItemAssembler'
        );
    }

    private static function getFileObjectViewModelListItemAssemblerTest(): FileObject
    {
        return new FileObject(
            FixturesConfig::TEST_BASE_NAMESPACE . FixturesConfig::API_DIR . 'ViewModels\Domain\SubDomain\\' . self::getEntityName(
            ) . 'ListItemAssemblerTest'
        );
    }

    private static function getFileObjectViewModel(): FileObject
    {
        return new FileObject(
            FixturesConfig::BASE_NAMESPACE . FixturesConfig::API_DIR . 'ViewModels\Domain\SubDomain\\' . self::getEntityName(
            )
        );
    }

    private static function getFileObjectViewModelDetail(): FileObject
    {
        return new FileObject(
            FixturesConfig::BASE_NAMESPACE . FixturesConfig::API_DIR . 'ViewModels\Domain\SubDomain\\' . self::getEntityName(
            ) . 'Detail'
        );
    }

    private static function getFileObjectViewModelListItem(): FileObject
    {
        return new FileObject(
            FixturesConfig::BASE_NAMESPACE . FixturesConfig::API_DIR . 'ViewModels\Domain\SubDomain\\' . self::getEntityName(
            ) . 'ListItem'
        );
    }

    private static function getFileObjectViewModelDetailStub(): FileObject
    {
        return new FileObject(
            FixturesConfig::STUB_NAMESPACE . FixturesConfig::API_DIR . 'ViewModels\Domain\SubDomain\\' . self::getEntityName(
            ) . 'DetailStub1'
        );
    }

    private static function getFileObjectViewModelListItemStub(): FileObject
    {
        return new FileObject(
            FixturesConfig::STUB_NAMESPACE . FixturesConfig::API_DIR . 'ViewModels\Domain\SubDomain\\' . self::getEntityName(
            ) . 'ListItemStub1'
        );
    }

    /**
     * @test
     */
    public function InvalidTye_Create_ThrowException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->factory->create('INVALID_TYPE', self::class, '');
    }

    protected function setUp(): void
    {
        $this->factory = new ViewModelFileObjectFactoryMock();
    }
}
