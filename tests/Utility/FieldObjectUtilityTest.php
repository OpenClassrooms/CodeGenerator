<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Utility;

use OpenClassrooms\CodeGenerator\Entities\FieldObject;
use OpenClassrooms\CodeGenerator\Utility\FieldObjectUtility;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class FieldObjectUtilityTest extends TestCase
{
    /**
     * @test
     */
    public function fieldAccessorReturnNull()
    {
        $class = (new class() {
            /**
             * @var string
             */
            public $field1;

            /**
             * @var string
             */
            public $field2;
        });

        $fieldObjects = FieldObjectUtility::getPublicClassFields(get_class($class));
        $exceptedValue = array_shift($fieldObjects);

        $this->assertInstanceOf(FieldObject::class, $exceptedValue);
        $this->assertNull($exceptedValue->getAccessor());
    }
}
