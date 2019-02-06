<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Scripts;

use Composer\Composer;
use Composer\Package\Package;
use Composer\Script\Event;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Scripts\ParameterHandlerMock;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Filesystem\Filesystem;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ParameterHandlerTest extends TestCase
{
    /**
     * @var Event|\PHPUnit_Framework_MockObject_MockObject
     */
    private $event;

    /**
     * @var Filesystem|\PHPUnit_Framework_MockObject_MockObject
     */
    private $filesystem;

    /**
     * @test
     */
    public function createGeneratorParameters()
    {
        ParameterHandlerMock::createGeneratorParameters($this->event);
    }

    protected function setUp()
    {
        $this->event = $this->createMock(Event::class);
        $this->filesystem = $this->createMock(Filesystem::class);
        $composer = $this->createMock(Composer::class);
        $package = $this->createMock(Package::class);
        $package->method('getName')->willReturn('');
        $composer->method('getPackage')->willReturn($package);
        $this->event->method('getComposer')->willReturn($composer);
        $this->filesystem->expects($this->once())->method('dumpFile');

        ParameterHandlerMock::$filesystem = $this->filesystem;
    }
}
