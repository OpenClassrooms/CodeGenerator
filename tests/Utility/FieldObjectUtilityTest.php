<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Utility;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Utility\FieldObjectUtility;
use PHPUnit\Framework\TestCase;

class FieldObjectUtilityTest extends TestCase
{
    /**
     * @test
     */
    public function fieldAccessorReturnNull(): void
    {
        $class = (new class() {
            public string $field1;

            public string $field2;
        });

        $fieldObjects = FieldObjectUtility::getPublicClassFields(get_class($class));
        $exceptedValue = array_shift($fieldObjects);

        $this->assertInstanceOf(FieldObject::class, $exceptedValue);
        $this->assertNull($exceptedValue->getAccessor());
    }
}
