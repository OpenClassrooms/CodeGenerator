<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Utility;

use OpenClassrooms\CodeGenerator\Entities\Object\ConstObject;
use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Utility\FieldUtility;
use OpenClassrooms\CodeGenerator\Utility\StubFieldUtility;
use PHPUnit\Framework\TestCase;

class FieldUtilityTest extends TestCase
{
    /**
     * @var FileObject
     */
    private $fileObject;

    public function generateStubFieldObjectsDataProvider(): array
    {
        return [
            [],
        ];
    }

    /**
     * @test
     */
    public function generateStubFieldObjectsReturnFieldObject(): void
    {
        $fields = [
            $this->buildStubFieldObject('field1', 'string'),
            $this->buildStubFieldObject('field2', 'bool'),
            $this->buildStubFieldObject('field3', 'array'),
            $this->buildStubFieldObject('field4', '\DateTimeImmutable'),
        ];
        $actualFieldObjects = StubFieldUtility::generateStubFieldObjects($fields);

        $this->assertCount(count($fields), $actualFieldObjects);

        foreach ($fields as $key => $field) {
            $this->assertEquals($field->getName(), $actualFieldObjects[$key]->getName());
        }
    }

    private function buildStubFieldObject(string $name, string $type): FieldObject
    {
        $stubFieldObject = new FieldObject($name);
        $stubFieldObject->setDocComment(
            '/**
     * @var ' . $type . '
     */'
        );
        $stubFieldObject->setValue(new ConstObject($name));

        return $stubFieldObject;
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function getFieldsThrowException(): void
    {
        $fields = ['notExistField'];
        FieldUtility::getFields(FunctionalEntity::class, $fields);
    }

    /**
     * @test
     */
    public function getFieldsWithEmptyList(): void
    {
        $fields = [];
        $exceptedFields = new \ReflectionClass(FunctionalEntity::class);
        $actualFields = FieldUtility::getFields(FunctionalEntity::class, $fields);
        $exceptedFields = $this->arrayFilterByGetter($exceptedFields->getMethods());
        $this->assertCount(count($actualFields), $exceptedFields);
    }

    private function arrayFilterByGetter(array $exceptedFields): array
    {
        return array_filter(
            $exceptedFields,
            function ($method) {
                if ('set' !== substr($method->getName(), 0, 3)) {
                    return $method;
                }

                return null;
            }
        );
    }

    protected function setUp(): void
    {
        $this->fileObject = new FileObject(self::class);
    }
}
