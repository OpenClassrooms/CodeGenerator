<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Commands;

use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Commands\GenerateGeneratorCommandMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Commands\GenericUseCaseCommandMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators\GenerateGeneratorMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Symfony\Component\DependencyInjection\ContainerMock;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenerateGeneratorCommandTest extends TestCase
{
    use CommandTestCase;

    const DOMAIN = 'GenerateGenerator';

    const ENTITY = 'Custom';

    /**
     * @var GenericUseCaseCommandMock
     */
    protected $commandMock;

    /**
     * @var GenerateGeneratorMediatorMock
     */
    private $selfGeneratorMediatorMock;

    /**
     * @test
     */
    public function executeCommand_withArguments()
    {
        GenerateGeneratorMediatorMock::$fileObjects = $this->writeFileObjects(
            GenerateGeneratorMediatorMock::$fileObjects
        );

        $this->commandTester->execute(
            [
                'command'    => $this->commandMock->getName(),
                Args::DOMAIN => self::DOMAIN,
                Args::ENTITY => self::ENTITY,
            ]
        );

        $this->assertCommandFileGeneratedOutput(GenerateGeneratorMediatorMock::$fileObjects);
    }

    /**
     * @test
     */
    public function executeCommand_withoutArguments()
    {
        GenerateGeneratorMediatorMock::$fileObjects = $this->writeFileObjects(
            GenerateGeneratorMediatorMock::$fileObjects
        );

        $this->commandTester->setInputs(
            [
                Args::DOMAIN => self::DOMAIN,
                Args::ENTITY => self::ENTITY,
            ]
        );
        $this->commandTester->execute(
            [
                'command' => $this->commandMock->getName(),
            ]
        );

        $this->assertCommandFileGeneratedOutput(GenerateGeneratorMediatorMock::$fileObjects);
    }

    protected function setUp()
    {
        $this->commandMock = new GenerateGeneratorCommandMock();
        $this->application = new Application();
        $this->application->add($this->commandMock);
        $this->commandTester = new CommandTester($this->commandMock);
        $this->selfGeneratorMediatorMock = new GenerateGeneratorMediatorMock();
        $this->container = new ContainerMock(
            ['open_classrooms.code_generator.mediators.generate_generator.generate_generator_mediator' => $this->selfGeneratorMediatorMock]

        );
        TestClassUtil::setProperty('container', $this->container, $this->commandMock);
    }
}

