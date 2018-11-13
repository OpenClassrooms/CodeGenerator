<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Commands\Test;

use OpenClassrooms\CodeGenerator\Commands\Test\GenerateViewModelTestCommand;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Generator\Tests\Api\ViewModels\ViewModelTestGeneratorMockOld;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\DependencyInjection\Container;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class GenerateViewModelTestCommandTest extends TestCase
{
    /**
     * @var Application
     */
    private $application;

    /**
     * @var GenerateViewModelTestCommand
     */
    private $command;

    /**
     * @var CommandTester
     */
    private $commandTester;

    /**
     * @var Container
     */
    private $container;

    /**
     * @test
     * @throws \Exception
     */
    public function askedHelp_DisplayHelp()
    {
//        $output = new BufferedOutput();
//        $this->command->run(new StringInput('--help'), $output);
//        self::assertSame(GenerateViewModelTestCommand::HELP, $output->fetch());

//        $application = new Application();
//        $application->add($this->command);
//        $commandTester = new CommandTester($this->command);
//
//        $commandTester->execute([
//            'command' => $this->command->getName(),
//            ['--help' => 'option_value'],
//        ]);
//
//        $output = $commandTester->getDisplay();
//
//        self::assertContains(GenerateViewModelTestCommand::HELP, $output);
    }

    /**
     * @test
     */
    public function generateCommand_NotWorkingParams()
    {
    }

    /**
     * @test
     */
    public function generateCommand_ReturnFilePaths()
    {

    }

    /**
     * @test
     */
    public function generateCommand_WorkingParams()
    {
        $expected = 'TestIsWorking';
        $this->commandTester->execute([
            'command'                => $this->command->getName(),
            'responseShortClassName' => $expected,
        ]);

        $output = $this->commandTester->getDisplay();

        self::assertContains($expected, $output);
    }

    /**
     * @test
     */
    public function withoutArguments_DisplayHelp()
    {
        $this->commandTester->execute([
            'command' => $this->command->getName(),
        ]);

        $output = $this->commandTester->getDisplay();

        self::assertContains('ok', $output);
    }

    protected function setUp()
    {
        $this->command = new GenerateViewModelTestCommand();
        $this->application = new Application();
        $this->application->add($this->command);
        $this->commandTester = new CommandTester($this->command);
        $this->container = $this->createMock(Container::class);
        $this->container->method('get')->willReturn(new ViewModelTestGeneratorMockOld());
        TestClassUtil::setProperty('container', $this->container, $this->command);
    }
}
