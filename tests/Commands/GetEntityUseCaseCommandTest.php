<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Commands;

use OpenClassrooms\CodeGenerator\Commands\UseCases\GetEntityUseCaseCommand;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\GetEntityUseCaseMediator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Commands\GetEntityUseCaseCommandMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators\GetEntityUseCaseMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Symfony\Component\DependencyInjection\ContainerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class GetEntityUseCaseCommandTest extends TestCase
{
    use CommandTestCase;

    /**
     * @var GetEntityUseCaseCommand
     */
    protected $command;

    /**
     * @var GetEntityUseCaseMediator
     */
    private $getEntityUseCaseMediator;

    /**
     * @test
     */
    public function executeCommandWithArguments(): void
    {
        GetEntityUseCaseMediatorMock::$fileObjects = $this->writeFileObjects(
            GetEntityUseCaseMediatorMock::$fileObjects
        );

        $this->commandTester->execute(
            [
                'command'        => $this->command->getName(),
                Args::CLASS_NAME => FunctionalEntity::class,
            ]
        );

        $this->assertCommandFileGeneratedOutput(GetEntityUseCaseMediatorMock::$fileObjects);
    }

    /**
     * @test
     */
    public function executeCommandWithFilePathArgument(): void
    {
        GetEntityUseCaseMediatorMock::$fileObjects = $this->writeFileObjects(
            GetEntityUseCaseMediatorMock::$fileObjects
        );

        $this->commandTester->execute(
            [
                'command'        => $this->command->getName(),
                Args::CLASS_NAME => '/Users/samuel.gomis/projects/CodeGenerator/tests/Fixtures/Classes/BusinessRules/Entities/Domain/SubDomain/FunctionalEntity.php',
            ]
        );

        $this->assertCommandFileGeneratedOutput(GetEntityUseCaseMediatorMock::$fileObjects);
    }

    /**
     * @test
     */
    public function executeCommandWithoutArguments(): void
    {
        GetEntityUseCaseMediatorMock::$fileObjects = $this->writeFileObjects(
            GetEntityUseCaseMediatorMock::$fileObjects
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

        $this->assertCommandFileGeneratedOutput(GetEntityUseCaseMediatorMock::$fileObjects);
    }

    /**
     * @test
     * @expectedException \OpenClassrooms\CodeGenerator\Commands\Exceptions\ClassNameNotExistException
     */
    public function executeCommandWithBadClassNameArgument(): void
    {
        GetEntityUseCaseMediatorMock::$fileObjects = $this->writeFileObjects(
            GetEntityUseCaseMediatorMock::$fileObjects
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

        $this->assertCommandFileGeneratedOutput(GetEntityUseCaseMediatorMock::$fileObjects);
    }

    protected function setUp(): void
    {
        $this->command = new GetEntityUseCaseCommandMock();
        $this->application = new Application();
        $this->application->add($this->command);
        $this->commandTester = new CommandTester($this->command);
        $this->getEntityUseCaseMediator = new GetEntityUseCaseMediatorMock();
        $this->container = new ContainerMock(
            ['open_classrooms.code_generator.mediators.business_rules.use_cases.get_entity_use_case_mediator' => $this->getEntityUseCaseMediator]

        );
        TestClassUtil::setProperty('container', $this->container, $this->command);
    }
}

