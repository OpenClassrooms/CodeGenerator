<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Utility;

use OpenClassrooms\CodeGenerator\Utility\DocCommentUtility;
use PHPUnit\Framework\TestCase;

class DocCommentUtilityTest extends TestCase
{
    /**
     * @test
     */
    public function getReturnTypeReturnArray(): void
    {
        $class = (new class() {
            /**
             * @return string[]
             */
            public function getValues(array $args)
            {
                return $args;
            }
        });

        $method = (new \ReflectionClass($class))->getMethod('getValues');
        $expectedValue = DocCommentUtility::getReturnType($method->getDocComment());

        $this->assertSame($expectedValue, DocCommentUtility::ARRAY_TYPE);
    }
}
