<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Commands;

use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Commands\GenericUseCaseCommandMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Commands\SelfGeneratorCommandMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators\SelfGeneratorMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Symfony\Component\DependencyInjection\ContainerMock;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class SelfGeneratorCommandTest extends TestCase
{
    use CommandTestCase;

    const DOMAIN = 'SelfGenerator';

    const ENTITY = 'Custom';

    /**
     * @var GenericUseCaseCommandMock
     */
    protected $commandMock;

    /**
     * @var SelfGeneratorMediatorMock
     */
    private $selfGeneratorMediatorMock;

    /**
     * @test
     */
    public function executeCommand_withArguments()
    {
        SelfGeneratorMediatorMock::$fileObjects = $this->writeFileObjects(SelfGeneratorMediatorMock::$fileObjects);

        $this->commandTester->execute(
            [
                'command'    => $this->commandMock->getName(),
                Args::DOMAIN => self::DOMAIN,
                Args::ENTITY => self::ENTITY,
            ]
        );

        $this->assertCommandFileGeneratedOutput(SelfGeneratorMediatorMock::$fileObjects);
    }

    /**
     * @test
     */
    public function executeCommand_withoutArguments()
    {
        SelfGeneratorMediatorMock::$fileObjects = $this->writeFileObjects(SelfGeneratorMediatorMock::$fileObjects);

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

        $this->assertCommandFileGeneratedOutput(SelfGeneratorMediatorMock::$fileObjects);
    }

    protected function setUp()
    {
        $this->commandMock = new SelfGeneratorCommandMock();
        $this->application = new Application();
        $this->application->add($this->commandMock);
        $this->commandTester = new CommandTester($this->commandMock);
        $this->selfGeneratorMediatorMock = new SelfGeneratorMediatorMock();
        $this->container = new ContainerMock(
            ['open_classrooms.code_generator.mediators.self_generator.self_generator_mediator' => $this->selfGeneratorMediatorMock]

        );
        TestClassUtil::setProperty('container', $this->container, $this->commandMock);
    }
}

