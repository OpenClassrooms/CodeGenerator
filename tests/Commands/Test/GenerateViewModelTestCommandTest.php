<?php

namespace OpenClassrooms\CodeGenerator\Tests\Commands\Test;

use OpenClassrooms\CodeGenerator\Commands\Test\GenerateViewModelTestCommand;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class GenerateViewModelTestCommandTest extends TestCase
{
    /**
     * @var GenerateViewModelTestCommand
     */
    private $command;

    /**
     * @var Application
     */
    private $application;

    /**
     * @var CommandTester
     */
    private $commandTester;


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
    public function withoutArguments_DisplayHelp()
    {
        $this->commandTester->execute([
            'command' => $this->command->getName(),
        ]);

        $output = $this->commandTester->getDisplay();

        self::assertContains('ok', $output);
    }



    public function generateCommand_ReturnFilePaths()
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
    }
}
