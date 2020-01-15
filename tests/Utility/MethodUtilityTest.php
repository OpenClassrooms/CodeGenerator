<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Utility;

use OpenClassrooms\CodeGenerator\Utility\DocCommentUtility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;
use PHPUnit\Framework\TestCase;

class MethodUtilityTest extends TestCase
{
    /**
     * @test
     */
    public function createArgumentNameFromMethodReturnNull(): void
    {
        $exceptedValue = MethodUtility::createArgumentNameFromMethod('notWorkingMethodName');

        $this->assertNull($exceptedValue);
    }

    /**
     * @test
     */
    public function getAccessorsReturnMethodObjects(): void
    {
        $class = (new class() {
            /**
             * @return string
             */
            public function getValue(string $argument)
            {
                echo $argument;
            }
        });

        $fields = MethodUtility::getAccessors(get_class($class));
        $field = array_shift($fields);
        $method = (new \ReflectionClass($class))->getMethod('getValue');

        $this->assertSame($field->getName(), $method->getName());
        $this->assertSame($field->getDocComment(), $method->getDocComment());
        $this->assertSame($field->getReturnType(), DocCommentUtility::getReturnType($method->getDocComment()));
        $this->assertSame($field->isNullable(), DocCommentUtility::allowsNull($method->getDocComment()));
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function getAccessorsThrowException(): void
    {
        $class = (new class() {
            public function getMethod(string $argument)
            {
                return $argument;
            }
        });

        MethodUtility::getAccessors(get_class($class));
    }
}
