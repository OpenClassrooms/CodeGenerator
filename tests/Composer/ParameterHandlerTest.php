<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Package\Package;
use Composer\Script\Event;
use Incenteev\ParameterHandler\Processor;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Scripts\ParameterHandlerMock;
use PHPUnit\Framework\TestCase;

class ParameterHandlerTest extends TestCase
{
    /**
     * @var Composer|\PHPUnit_Framework_MockObject_MockObject
     */
    private $composer;

    /**
     * @var Event|\PHPUnit_Framework_MockObject_MockObject
     */
    private $event;

    /**
     * @var Package|\PHPUnit_Framework_MockObject_MockObject
     */
    private $package;

    /**
     * @var Processor|\PHPUnit_Framework_MockObject_MockObject
     */
    private $processor;

    /**
     * @test
     */
    public function createGeneratorParameters_FileDumped(): void
    {
        $this->processor->expects($this->once())->method('processFile');

        ParameterHandlerMock::createGeneratorFileParameters($this->event);
    }

    /**
     * @test
     */
    public function createGeneratorParameters_NotVendorInstallation(): void
    {
        $this->package->method('getName')->willReturn(ParameterHandlerMock::CODE_GENERATOR);
        $this->processor->expects($this->never())->method('processFile');

        ParameterHandlerMock::createGeneratorFileParameters($this->event);
    }

    protected function setUp(): void
    {
        $this->composer = $this->createMock(Composer::class);
        $this->event = $this->createMock(Event::class);
        $this->package = $this->createMock(Package::class);
        $this->processor = $this->createMock(Processor::class);

        $this->composer->method('getPackage')->willReturn($this->package);
        $this->event->method('getComposer')->willReturn($this->composer);
        $this->event->method('getIO')->willReturn($this->createMock(IOInterface::class));

        ParameterHandlerMock::$processor = $this->processor;
    }
}
