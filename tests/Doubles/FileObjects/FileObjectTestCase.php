<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use PHPUnit\Framework\Assert as Assert;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait FileObjectTestCase
{
    private function assertFields(array $expectedFields, array $actualFields): void
    {
        $actualAccessors = $this->extractProperties($expectedFields, 'getAccessor');
        $expectedAccessors = $this->extractProperties($actualFields, 'getAccessor');
        Assert::assertEquals($actualAccessors, $expectedAccessors);

        $actualDocComments = $this->extractProperties($expectedFields, 'getDocComment');
        $expectedDocComments = $this->extractProperties($actualFields, 'getDocComment');
        Assert::assertEquals($actualDocComments, $expectedDocComments);

        $actualPropertiesName = $this->extractProperties($expectedFields, 'getName');
        $expectedPropertiesName = $this->extractProperties($actualFields, 'getName');
        Assert::assertEquals($actualPropertiesName, $expectedPropertiesName);
    }

    protected function assertFileObject(FileObject $expected, FileObject $actual)
    {
        Assert::assertEquals($expected->getClassName(), $actual->getClassName());
        Assert::assertStringEqualsFile($expected->getContent(), $actual->getContent());
        Assert::assertEquals($expected->getId(), $actual->getId());
        Assert::assertEquals($expected->getNamespace(), $actual->getNamespace());
        Assert::assertEquals($expected->getPath(), $actual->getPath());
        Assert::assertEquals($expected->getShortClassName(), $actual->getShortClassName());

        $this->assertFields($expected->getFields(), $actual->getFields());
    }

    private function extractProperties(array $objects, string $property): array
    {
        $propertiesList = [];
        foreach ($objects as $object) {
            $propertiesList[] = $object->$property();
        }

        return $propertiesList;
    }
}
