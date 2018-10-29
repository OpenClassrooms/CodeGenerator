<?php

namespace FileObjects;

use FileObjects\Impl\FileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class FileObjectFactoryTest extends TestCase
{
    /**
     * @var \FileObjects\FileObjectFactory
     */
    private $factory;

    public static function fileObjectDataProvider()
    {
        $fileObject1 = new FileObject();
        \TestClassUtil::setProperty('className', 'ViewModels\Domain\SubDomain\classAssembler', $fileObject1);

        return [
            [FileObjectType::API_VIEW_MODEL_ASSEMBLER, FunctionalEntity::class, $fileObject1],
//            [FileObjectType::API_VIEW_MODEL_ASSEMBLER, FunctionalEntity::class, $fileObject2]
        ];
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
