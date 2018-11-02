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
            ]
        ];
    }

    private static function getFileObjectViewModelAssembler(): FileObject
    {
        $fileObjectViewModelAssembler = new FileObject();
        TestClassUtil::setProperty(
            'className',
            'ViewModels\Domain\SubDomain\\'.self::getShortClassName(FunctionalEntity::class).'Assembler',
            $fileObjectViewModelAssembler
        );

        return $fileObjectViewModelAssembler;
    }

    private static function getShortClassName(string $className)
    {
        $rc = new \ReflectionClass($className);

        return $rc->getShortName();
    }

    private static function getFileObjectViewModelAssemblerTest(): FileObject
    {
        $fileObjectViewModelAssemblerTest = new FileObject();
        TestClassUtil::setProperty(
            'className',
            self::TEST_BASE_NAMESPACE.'ViewModels\Domain\SubDomain\\'.self::getShortClassName(
                FunctionalEntity::class
            ).'AssemblerTest',
            $fileObjectViewModelAssemblerTest
        );

        return $fileObjectViewModelAssemblerTest;
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
    }
}
