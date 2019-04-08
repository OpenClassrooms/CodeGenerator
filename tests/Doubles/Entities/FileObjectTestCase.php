<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use PHPUnit\Framework\Assert as Assert;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait FileObjectTestCase
{
    use FieldObjectTestCase;
    use MethodObjectTestCase;

    protected function assertFileObject(FileObject $expected, FileObject $actual)
    {
        Assert::assertEquals($expected->getClassName(), $actual->getClassName());
        Assert::assertStringEqualsFile($expected->getContent(), $actual->getContent());
        Assert::assertEquals($expected->getId(), $actual->getId());
        Assert::assertEquals($expected->getNamespace(), $actual->getNamespace());
        Assert::assertEquals($expected->getPath(), $actual->getPath());
        Assert::assertEquals($expected->getShortName(), $actual->getShortName());
        if (!empty($expected->getFields())) {
            $this->assertFieldObjects($expected->getFields(), $actual->getFields());
        }
        if (!empty($expected->getMethods())) {
            $this->assertMethodObjects($expected->getMethods(), $actual->getMethods());
        }
    }
}
