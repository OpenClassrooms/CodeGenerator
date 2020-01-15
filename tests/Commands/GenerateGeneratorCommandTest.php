<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Commands;

use OpenClassrooms\CodeGenerator\Commands\GenericUseCaseCommand;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\GenerateGenerator\GenerateGeneratorMediator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Commands\GenerateGeneratorCommandMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators\GenerateGeneratorMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Symfony\Component\DependencyInjection\ContainerMock;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class GenerateGeneratorCommandTest extends TestCase
{
    use CommandTestCase;

    const DOMAIN = 'GenerateGenerator';

    const ENTITY = 'Custom';

    /**
     * @var GenericUseCaseCommand
     */
    protected $command;

    /**
     * @var GenerateGeneratorMediator
     */
    private $selfGeneratorMediator;

    /**
     * @test
     */
    public function executeCommandWithArguments(): void
    {
        GenerateGeneratorMediatorMock::$fileObjects = $this->writeFileObjects(
            GenerateGeneratorMediatorMock::$fileObjects
        );

        $this->commandTester->execute(
            [
                'command'    => $this->command->getName(),
                Args::DOMAIN => self::DOMAIN,
                Args::ENTITY => self::ENTITY,
            ]
        );

        $this->assertCommandFileGeneratedOutput(GenerateGeneratorMediatorMock::$fileObjects);
    }

    /**
     * @test
     */
    public function executeCommandWithoutArguments(): void
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
                'command' => $this->command->getName(),
            ]
        );

        $this->assertCommandFileGeneratedOutput(GenerateGeneratorMediatorMock::$fileObjects);
    }

    protected function setUp(): void
    {
        $this->command = new GenerateGeneratorCommandMock();
        $this->application = new Application();
        $this->application->add($this->command);
        $this->commandTester = new CommandTester($this->command);
        $this->selfGeneratorMediator = new GenerateGeneratorMediatorMock();
        $this->container = new ContainerMock(
            ['open_classrooms.code_generator.mediators.generate_generator.generate_generator_mediator' => $this->selfGeneratorMediator]

        );
        TestClassUtil::setProperty('container', $this->container, $this->command);
    }
}

