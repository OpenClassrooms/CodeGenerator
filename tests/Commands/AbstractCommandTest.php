<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Commands;

use OpenClassrooms\CodeGenerator\Commands\CommandLabelType;
use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use PHPUnit\Framework\MockObject\Builder\InvocationMocker;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
abstract class AbstractCommandTest extends TestCase
{
    /**
     * @var Application
     */
    protected $application;

    /**
     * @var CommandTester
     */
    protected $commandTester;

    /**
     * @var InvocationMocker
     */
    protected $container;

    /**
     * @param FileObject[]
     *
     */
    protected function writeFileObjects(array $fileObjects)
    {
        foreach ($fileObjects as $fileObject) {
            $fileObject->write();
            $fileObjects[] = $fileObject;
        }

        return $fileObjects;
    }

    /**
     * @param FileObject[]
     */
    protected function assertCommandFileGeneratedOutput(array $writtenFileObjects): void
    {
        $output = $this->commandTester->getDisplay();

        foreach ($writtenFileObjects as $fileObject) {
            $this->assertContains(CommandLabelType::GENERATED_OUTPUT, $output);
            $this->assertContains($fileObject->getPath(), $output);
            $this->assertNotContains($fileObject->getContent(), $output);
        }
    }
}
