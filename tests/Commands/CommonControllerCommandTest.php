<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Commands;

use OpenClassrooms\CodeGenerator\Commands\Exceptions\BadCommandArgumentException;
use OpenClassrooms\CodeGenerator\Commands\Exceptions\ClassNameNotExistException;
use OpenClassrooms\CodeGenerator\Commands\Presentation\CommonControllerCommand;
use OpenClassrooms\CodeGenerator\Mediators\Api\Controller\CommonControllerMediator;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\ClassType;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Commands\CommonControllerCommandMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators\CommonControllerMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators\CreateEntityUseCaseMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Symfony\Component\DependencyInjection\ContainerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class CommonControllerCommandTest extends TestCase
{
    use CommandTestCase;

    protected CommonControllerCommand $command;

    private CommonControllerMediator $commonControllerMediator;

    /**
     * @test
     */
    public function executeCommandWithBadArgumentType(): void
    {
        $this->expectException(BadCommandArgumentException::class);

        CommonControllerMediatorMock::$fileObjects = $this->writeFileObjects(
            CommonControllerMediatorMock::$fileObjects
        );

        $this->commandTester->setInputs(
            [
                Args::TYPE => -1,
            ]
        );
        $this->commandTester->execute(
            [
                'command'        => $this->command->getName(),
                Args::CLASS_NAME => FunctionalEntity::class,
            ]
        );
    }

    /**
     * @test
     */
    public function executeCommandWithArguments(): void
    {
        CommonControllerMediatorMock::$fileObjects = $this->writeFileObjects(
            CommonControllerMediatorMock::$fileObjects
        );

        $this->commandTester->execute(
            [
                'command'        => $this->command->getName(),
                Args::CLASS_NAME => FunctionalEntity::class,
                Args::TYPE       => ClassType::DELETE,
            ]
        );

        $this->assertCommandFileGeneratedOutput(CommonControllerMediatorMock::$fileObjects);
    }

    /**
     * @test
     */
    public function executeCommandWithoutArguments(): void
    {
        CommonControllerMediatorMock::$fileObjects = $this->writeFileObjects(
            CommonControllerMediatorMock::$fileObjects
        );

        $this->commandTester->setInputs(
            [
                Args::CLASS_NAME => FunctionalEntity::class,
                Args::TYPE       => ClassType::DELETE,
            ]
        );
        $this->commandTester->execute(
            [
                'command' => $this->command->getName(),
            ]
        );

        $this->assertCommandFileGeneratedOutput(CommonControllerMediatorMock::$fileObjects);
    }

    /**
     * @test
     */
    public function executeCommandWithBadClassNameArgument(): void
    {
        $this->expectException(ClassNameNotExistException::class);

        CommonControllerMediatorMock::$fileObjects = $this->writeFileObjects(
            CommonControllerMediatorMock::$fileObjects
        );

        $this->commandTester->setInputs(
            [
                Args::CLASS_NAME => -1,
                Args::TYPE       => ClassType::DELETE,
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
        $this->command = new CommonControllerCommandMock();
        $this->application = new Application();
        $this->application->add($this->command);
        $this->commandTester = new CommandTester($this->command);
        $this->commonControllerMediator = new CommonControllerMediatorMock();
        $this->container = new ContainerMock(
            [CommonControllerMediator::class => $this->commonControllerMediator]
        );
        TestClassUtil::setProperty('container', $this->container, $this->command);
    }
}

