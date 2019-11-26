<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Commands;

use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Commands\GetEntityUseCaseCommandMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators\GetEntityUseCaseMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Symfony\Component\DependencyInjection\ContainerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityUseCaseCommandTest extends TestCase
{
    use CommandTestCase;

    /**
     * @var GetEntityUseCaseCommandMock
     */
    protected $commandMock;

    /**
     * @var GetEntityUseCaseMediatorMock
     */
    private $getEntityUseCaseMediatorMock;

    /**
     * @test
     */
    public function executeCommand_withArguments(): void
    {
        GetEntityUseCaseMediatorMock::$fileObjects = $this->writeFileObjects(
            GetEntityUseCaseMediatorMock::$fileObjects
        );

        $this->commandTester->execute(
            [
                'command'        => $this->commandMock->getName(),
                Args::CLASS_NAME => FunctionalEntity::class,
            ]
        );

        $this->assertCommandFileGeneratedOutput(GetEntityUseCaseMediatorMock::$fileObjects);
    }

    /**
     * @test
     */
    public function executeCommand_withoutArguments(): void
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
                'command' => $this->commandMock->getName(),
            ]
        );

        $this->assertCommandFileGeneratedOutput(GetEntityUseCaseMediatorMock::$fileObjects);
    }

    protected function setUp(): void
    {
        $this->commandMock = new GetEntityUseCaseCommandMock();
        $this->application = new Application();
        $this->application->add($this->commandMock);
        $this->commandTester = new CommandTester($this->commandMock);
        $this->getEntityUseCaseMediatorMock = new GetEntityUseCaseMediatorMock();
        $this->container = new ContainerMock(
            ['open_classrooms.code_generator.mediators.business_rules.use_cases.get_entity_use_case_mediator' => $this->getEntityUseCaseMediatorMock]

        );
        TestClassUtil::setProperty('container', $this->container, $this->commandMock);
    }
}

