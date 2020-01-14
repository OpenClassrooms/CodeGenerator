<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Utility;

use OpenClassrooms\CodeGenerator\Utility\MethodUtility;
use OpenClassrooms\CodeGenerator\Utility\useCarbonTrait;
use PHPUnit\Framework\TestCase;

class UseCarbonTraitTest extends TestCase
{
    use useCarbonTrait;

    /**
     * @var __anonymous@919
     */
    private $class;

    /**
     * @test
     */
    public function useCarbonReturnFalse()
    {
        $method = MethodUtility::getAccessors(get_class($this->class));
        $actual = $this->useCarbon($method);
        $this->assertFalse($actual);
    }

    /**
     * @test
     */
    public function methodArgumentUseCarbonReturnFalse()
    {
        $method = MethodUtility::buildWitherMethods(get_class($this->class));
        $actual = $this->methodArgumentUseCarbon($method);
        $this->assertFalse($actual);
    }

    protected function setUp()
    {
        $this->class = (new class() {
            /**
             * @return string
             */
            public function getValue(string $argument)
            {
                echo $argument;
            }
        });
    }
}
