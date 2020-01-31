<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Commands;

use OpenClassrooms\CodeGenerator\Commands\UseCases\DeleteEntityUseCaseCommand;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\DeleteEntityUseCaseMediator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Commands\DeleteEntityUseCaseCommandMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators\DeleteEntityUseCaseMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Symfony\Component\DependencyInjection\ContainerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class DeleteEntityUseCaseCommandTest extends TestCase
{
    use CommandTestCase;

    /**
     * @var DeleteEntityUseCaseCommand
     */
    protected $command;

    /**
     * @var DeleteEntityUseCaseMediator
     */
    private $deleteEntityUseCaseMediator;

    /**
     * @test
     */
    public function executeCommandWithArguments(): void
    {
        DeleteEntityUseCaseMediatorMock::$fileObjects = $this->writeFileObjects(
            DeleteEntityUseCaseMediatorMock::$fileObjects
        );

        $this->commandTester->execute(
            [
                'command'        => $this->command->getName(),
                Args::CLASS_NAME => FunctionalEntity::class,
            ]
        );

        $this->assertCommandFileGeneratedOutput(DeleteEntityUseCaseMediatorMock::$fileObjects);
    }

    /**
     * @test
     */
    public function executeCommandWithoutArguments(): void
    {
        DeleteEntityUseCaseMediatorMock::$fileObjects = $this->writeFileObjects(
            DeleteEntityUseCaseMediatorMock::$fileObjects
        );

        $this->commandTester->setInputs(
            [
                Args::CLASS_NAME => FunctionalEntity::class,
            ]
        );
        $this->commandTester->execute(
            [
                'command' => $this->command->getName(),
            ]
        );

        $this->assertCommandFileGeneratedOutput(DeleteEntityUseCaseMediatorMock::$fileObjects);
    }

    /**
     * @test
     * @expectedException \OpenClassrooms\CodeGenerator\Commands\Exceptions\ClassNameNotExistException
     */
    public function executeCommandWithBadClassNameArgument(): void
    {
        DeleteEntityUseCaseMediatorMock::$fileObjects = $this->writeFileObjects(
            DeleteEntityUseCaseMediatorMock::$fileObjects
        );

        $this->commandTester->setInputs(
            [
                Args::CLASS_NAME => -1,
            ]
        );
        $this->commandTester->execute(
            [
                'command' => $this->command->getName(),
            ]
        );

        $this->assertCommandFileGeneratedOutput(DeleteEntityUseCaseMediatorMock::$fileObjects);
    }

    protected function setUp(): void
    {
        $this->command = new DeleteEntityUseCaseCommandMock();
        $this->application = new Application();
        $this->application->add($this->command);
        $this->commandTester = new CommandTester($this->command);
        $this->deleteEntityUseCaseMediator = new DeleteEntityUseCaseMediatorMock();
        $this->container = new ContainerMock(
            [DeleteEntityUseCaseMediator::class => $this->deleteEntityUseCaseMediator]

        );
        TestClassUtil::setProperty('container', $this->container, $this->command);
    }
}

