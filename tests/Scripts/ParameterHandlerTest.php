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
     * @var Composer|\PHPUnit_Framework_MockObject_MockObject
     */
    private $composer;

    /**
     * @var Event|\PHPUnit_Framework_MockObject_MockObject
     */
    private $event;

    /**
     * @var Filesystem|\PHPUnit_Framework_MockObject_MockObject
     */
    private $filesystem;

    /**
     * @var Package|\PHPUnit_Framework_MockObject_MockObject
     */
    private $package;

    /**
     * @test
     */
    public function createGeneratorParameters_FileDumped()
    {
        $this->filesystem->expects($this->once())->method('dumpFile');

        ParameterHandlerMock::createGeneratorParameters($this->event);
    }

    /**
     * @test
     */
    public function createGeneratorParameters_NotVendorInstallation()
    {
        $this->package->method('getName')->willReturn(ParameterHandlerMock::CODE_GENERATOR);
        $this->filesystem->expects($this->never())->method('dumpFile');

        ParameterHandlerMock::createGeneratorParameters($this->event);
    }

    protected function setUp()
    {
        $this->composer = $this->createMock(Composer::class);
        $this->event = $this->createMock(Event::class);
        $this->filesystem = $this->createMock(Filesystem::class);
        $this->package = $this->createMock(Package::class);

        $this->composer->method('getPackage')->willReturn($this->package);
        $this->event->method('getComposer')->willReturn($this->composer);

        ParameterHandlerMock::$filesystem = $this->filesystem;
    }
}
