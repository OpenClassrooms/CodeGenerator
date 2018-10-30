<?php

namespace Tests\FileObjects;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\FileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\FileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\Impl\FileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class FileObjectFactoryTest extends TestCase
{
    /**
     * @var FileObjectFactory
     */
    private $factory;

    public static function fileObjectDataProvider()
    {
        $i = 1;
        $provider = [];
        $fileObjectTypes = TestClassUtil::getConstants(FileObjectType::class);

        foreach ($fileObjectTypes as $fileObjectType) {
            $fileObject{$i} = new FileObject();
            $classShortName = TestClassUtil::getShortName(FunctionalEntity::class);
            //TODO use baseNamespace instead of ViewModels
            TestClassUtil::setProperty('className', 'ViewModels\Domain\SubDomain\\' . $classShortName, $fileObject{$i});
            $provider[] = [$fileObjectType, FunctionalEntity::class, $fileObject{$i}];
            $i++;
        }

        return $provider;
    }

    /**
     * @test
     * @dataProvider fileObjectDataProvider
     */
    public function create_ReturnFileObject($inputType, $inputClassName, FileObject $expected)
    {
        $actual = $this->factory->create($inputType, $inputClassName);
        $this->assertSame($expected->getClassName(), $actual->getClassName());
    }

    protected function setUp()
    {
        $this->factory = new FileObjectFactoryImpl();
    }
}
