<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Commands;

use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\EditEntityUseCaseMediator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Commands\EditEntityUseCaseCommandMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators\EditEntityUseCaseMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Symfony\Component\DependencyInjection\ContainerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class EditEntityUseCaseCommandTest extends TestCase
{
    use CommandTestCase;

    /**
     * @var EditEntityUseCaseCommandMock
     */
    protected $commandMock;

    /**
     * @var EditEntityUseCaseMediatorMock
     */
    private $createEntityUseCaseMediatorMock;

    /**
     * @test
     */
    public function executeCommand_withArguments(): void
    {
        EditEntityUseCaseMediatorMock::$fileObjects = $this->writeFileObjects(
            EditEntityUseCaseMediatorMock::$fileObjects
        );

        $this->commandTester->execute(
            [
                'command'        => $this->commandMock->getName(),
                Args::CLASS_NAME => FunctionalEntity::class,
            ]
        );

        $this->assertCommandFileGeneratedOutput(EditEntityUseCaseMediatorMock::$fileObjects);
    }

    /**
     * @test
     */
    public function executeCommand_withoutArguments(): void
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
                'command' => $this->commandMock->getName(),
            ]
        );

        $this->assertCommandFileGeneratedOutput(EditEntityUseCaseMediatorMock::$fileObjects);
    }

    protected function setUp(): void
    {
        $this->commandMock = new EditEntityUseCaseCommandMock();
        $this->application = new Application();
        $this->application->add($this->commandMock);
        $this->commandTester = new CommandTester($this->commandMock);
        $this->createEntityUseCaseMediatorMock = new EditEntityUseCaseMediatorMock();
        $this->container = new ContainerMock(
            [EditEntityUseCaseMediator::class => $this->createEntityUseCaseMediatorMock]

        );
        TestClassUtil::setProperty('container', $this->container, $this->commandMock);
    }
}

