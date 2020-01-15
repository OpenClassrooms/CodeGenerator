<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Commands;

use OpenClassrooms\CodeGenerator\Commands\GetEntitiesUseCaseCommand;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\GetEntitiesUseCaseMediator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Commands\GetEntitiesUseCaseCommandMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators\EditEntityUseCaseMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators\GetEntitiesUseCaseMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Symfony\Component\DependencyInjection\ContainerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class GetEntitiesUseCaseCommandTest extends TestCase
{
    use CommandTestCase;

    /**
     * @var GetEntitiesUseCaseCommand
     */
    protected $command;

    /**
     * @var GetEntitiesUseCaseMediator
     */
    private $getEntitiesUseCaseMediator;

    /**
     * @test
     */
    public function executeCommandWithArguments(): void
    {
        GetEntitiesUseCaseMediatorMock::$fileObjects = $this->writeFileObjects(
            GetEntitiesUseCaseMediatorMock::$fileObjects
        );

        $this->commandTester->execute(
            [
                'command'        => $this->command->getName(),
                Args::CLASS_NAME => FunctionalEntity::class,
            ]
        );

        $this->assertCommandFileGeneratedOutput(GetEntitiesUseCaseMediatorMock::$fileObjects);
    }

    /**
     * @test
     */
    public function executeCommandWithoutArguments(): void
    {
        GetEntitiesUseCaseMediatorMock::$fileObjects = $this->writeFileObjects(
            GetEntitiesUseCaseMediatorMock::$fileObjects
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

        $this->assertCommandFileGeneratedOutput(GetEntitiesUseCaseMediatorMock::$fileObjects);
    }

    /**
     * @test
     * @expectedException \OpenClassrooms\CodeGenerator\Exceptions\ClassNameNotExistException
     */
    public function executeCommandWithBadClassNameArgument(): void
    {
        GetEntitiesUseCaseMediatorMock::$fileObjects = $this->writeFileObjects(
            GetEntitiesUseCaseMediatorMock::$fileObjects
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

        $this->assertCommandFileGeneratedOutput(GetEntitiesUseCaseMediatorMock::$fileObjects);
    }

    protected function setUp(): void
    {
        $this->command = new GetEntitiesUseCaseCommandMock();
        $this->application = new Application();
        $this->application->add($this->command);
        $this->commandTester = new CommandTester($this->command);
        $this->getEntitiesUseCaseMediator = new GetEntitiesUseCaseMediatorMock();
        $this->container = new ContainerMock(
            ['open_classrooms.code_generator.mediators.business_rules.use_cases.get_entities_use_case_mediator' => $this->getEntitiesUseCaseMediator]

        );
        TestClassUtil::setProperty('container', $this->container, $this->command);
    }
}

