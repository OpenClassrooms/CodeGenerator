<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Commands;

use OpenClassrooms\CodeGenerator\Commands\Exceptions\ClassNameNotExistException;
use OpenClassrooms\CodeGenerator\Commands\UseCases\CreateEntityUseCaseCommand;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\CreateEntityUseCaseMediator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Commands\CreateEntityUseCaseCommandMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators\CreateEntityUseCaseMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Symfony\Component\DependencyInjection\ContainerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class CreateEntityUseCaseCommandTest extends TestCase
{
    use CommandTestCase;

    protected CreateEntityUseCaseCommand $command;

    private CreateEntityUseCaseMediator $createEntityUseCaseMediatorMock;

    /**
     * @test
     */
    public function executeCommandWithArguments(): void
    {
        CreateEntityUseCaseMediatorMock::$fileObjects = $this->writeFileObjects(
            CreateEntityUseCaseMediatorMock::$fileObjects
        );

        $this->commandTester->execute(
            [
                'command'        => $this->command->getName(),
                Args::CLASS_NAME => FunctionalEntity::class,
            ]
        );

        $this->assertCommandFileGeneratedOutput(CreateEntityUseCaseMediatorMock::$fileObjects);
    }

    /**
     * @test
     */
    public function executeCommandWithoutArguments(): void
    {
        CreateEntityUseCaseMediatorMock::$fileObjects = $this->writeFileObjects(
            CreateEntityUseCaseMediatorMock::$fileObjects
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

        $this->assertCommandFileGeneratedOutput(CreateEntityUseCaseMediatorMock::$fileObjects);
    }

    /**
     * @test
     */
    public function executeCommandWithBadClassNameArgument(): void
    {
        $this->expectException(ClassNameNotExistException::class);

        CreateEntityUseCaseMediatorMock::$fileObjects = $this->writeFileObjects(
            CreateEntityUseCaseMediatorMock::$fileObjects
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

        $this->assertCommandFileGeneratedOutput(CreateEntityUseCaseMediatorMock::$fileObjects);
    }

    protected function setUp(): void
    {
        $this->command = new CreateEntityUseCaseCommandMock();
        $this->application = new Application();
        $this->application->add($this->command);
        $this->commandTester = new CommandTester($this->command);
        $this->createEntityUseCaseMediatorMock = new CreateEntityUseCaseMediatorMock();
        $this->container = new ContainerMock(
            [CreateEntityUseCaseMediator::class => $this->createEntityUseCaseMediatorMock]
        );
        TestClassUtil::setProperty('container', $this->container, $this->command);
    }
}

