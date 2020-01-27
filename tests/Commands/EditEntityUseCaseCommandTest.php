<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Commands;

use OpenClassrooms\CodeGenerator\Commands\EditEntityUseCaseCommand;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\EditEntityUseCaseMediator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Commands\EditEntityUseCaseCommandMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators\DeleteEntityUseCaseMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators\EditEntityUseCaseMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Symfony\Component\DependencyInjection\ContainerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class EditEntityUseCaseCommandTest extends TestCase
{
    use CommandTestCase;

    /**
     * @var EditEntityUseCaseCommand
     */
    protected $command;

    /**
     * @var EditEntityUseCaseMediator
     */
    private $createEntityUseCaseMediator;

    /**
     * @test
     */
    public function executeCommandWithArguments(): void
    {
        EditEntityUseCaseMediatorMock::$fileObjects = $this->writeFileObjects(
            EditEntityUseCaseMediatorMock::$fileObjects
        );

        $this->commandTester->execute(
            [
                'command'        => $this->command->getName(),
                Args::CLASS_NAME => FunctionalEntity::class,
            ]
        );

        $this->assertCommandFileGeneratedOutput(EditEntityUseCaseMediatorMock::$fileObjects);
    }

    /**
     * @test
     */
    public function executeCommandWithoutArguments(): void
    {
        EditEntityUseCaseMediatorMock::$fileObjects = $this->writeFileObjects(
            EditEntityUseCaseMediatorMock::$fileObjects
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

        $this->assertCommandFileGeneratedOutput(EditEntityUseCaseMediatorMock::$fileObjects);
    }

    /**
     * @test
     * @expectedException \OpenClassrooms\CodeGenerator\Exceptions\ClassNameNotExistException
     */
    public function executeCommandWithBadClassNameArgument(): void
    {
        EditEntityUseCaseMediatorMock::$fileObjects = $this->writeFileObjects(
            EditEntityUseCaseMediatorMock::$fileObjects
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

        $this->assertCommandFileGeneratedOutput(EditEntityUseCaseMediatorMock::$fileObjects);
    }

    protected function setUp(): void
    {
        $this->command = new EditEntityUseCaseCommandMock();
        $this->application = new Application();
        $this->application->add($this->command);
        $this->commandTester = new CommandTester($this->command);
        $this->createEntityUseCaseMediator = new EditEntityUseCaseMediatorMock();
        $this->container = new ContainerMock(
            [EditEntityUseCaseMediator::class => $this->createEntityUseCaseMediator]

        );
        TestClassUtil::setProperty('container', $this->container, $this->command);
    }
}

