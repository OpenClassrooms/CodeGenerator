<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Commands;

use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Commands\GetEntitiesUseCaseCommandMock;
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
     * @var GetEntitiesUseCaseCommandMock
     */
    protected $commandMock;

    /**
     * @var GetEntitiesUseCaseMediatorMock
     */
    private $getEntitiesUseCaseMediatorMock;

    /**
     * @test
     */
    public function executeCommand_withArguments(): void
    {
        GetEntitiesUseCaseMediatorMock::$fileObjects = $this->writeFileObjects(
            GetEntitiesUseCaseMediatorMock::$fileObjects
        );

        $this->commandTester->execute(
            [
                'command'        => $this->commandMock->getName(),
                Args::CLASS_NAME => FunctionalEntity::class,
            ]
        );

        $this->assertCommandFileGeneratedOutput(GetEntitiesUseCaseMediatorMock::$fileObjects);
    }

    /**
     * @test
     */
    public function executeCommand_withoutArguments(): void
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
                'command' => $this->commandMock->getName(),
            ]
        );

        $this->assertCommandFileGeneratedOutput(GetEntitiesUseCaseMediatorMock::$fileObjects);
    }

    protected function setUp(): void
    {
        $this->commandMock = new GetEntitiesUseCaseCommandMock();
        $this->application = new Application();
        $this->application->add($this->commandMock);
        $this->commandTester = new CommandTester($this->commandMock);
        $this->getEntitiesUseCaseMediatorMock = new GetEntitiesUseCaseMediatorMock();
        $this->container = new ContainerMock(
            ['open_classrooms.code_generator.mediators.business_rules.use_cases.get_entities_use_case_mediator' => $this->getEntitiesUseCaseMediatorMock]

        );
        TestClassUtil::setProperty('container', $this->container, $this->commandMock);
    }
}

