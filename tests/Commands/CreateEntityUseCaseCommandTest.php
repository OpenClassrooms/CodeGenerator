<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Commands;

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

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class CreateEntityUseCaseCommandTest extends TestCase
{
    use CommandTestCase;

    /**
     * @var CreateEntityUseCaseCommandMock
     */
    protected $commandMock;

    /**
     * @var CreateEntityUseCaseMediatorMock
     */
    private $createEntityUseCaseMediatorMock;

    /**
     * @test
     */
    public function executeCommand_withArguments(): void
    {
        CreateEntityUseCaseMediatorMock::$fileObjects = $this->writeFileObjects(
            CreateEntityUseCaseMediatorMock::$fileObjects
        );

        $this->commandTester->execute(
            [
                'command'        => $this->commandMock->getName(),
                Args::CLASS_NAME => FunctionalEntity::class,
            ]
        );

        $this->assertCommandFileGeneratedOutput(CreateEntityUseCaseMediatorMock::$fileObjects);
    }

    /**
     * @test
     */
    public function executeCommand_withoutArguments(): void
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
                'command' => $this->commandMock->getName(),
            ]
        );

        $this->assertCommandFileGeneratedOutput(CreateEntityUseCaseMediatorMock::$fileObjects);
    }

    protected function setUp(): void
    {
        $this->commandMock = new CreateEntityUseCaseCommandMock();
        $this->application = new Application();
        $this->application->add($this->commandMock);
        $this->commandTester = new CommandTester($this->commandMock);
        $this->createEntityUseCaseMediatorMock = new CreateEntityUseCaseMediatorMock();
        $this->container = new ContainerMock(
            [CreateEntityUseCaseMediator::class => $this->createEntityUseCaseMediatorMock]

        );
        TestClassUtil::setProperty('container', $this->container, $this->commandMock);
    }
}

