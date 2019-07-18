<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Commands;

use OpenClassrooms\CodeGenerator\Commands\CommandLabelType;
use OpenClassrooms\CodeGenerator\Commands\ViewModelsCommand;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Commands\ViewModelsCommandMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators\ViewModelMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Symfony\Component\DependencyInjection\ContainerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelCommandTest extends TestCase
{
    use CommandTestCase;

    /**
     * @var ViewModelsCommandMock
     */
    protected $commandMock;

    /**
     * @var ViewModelMediatorMock
     */
    private $viewModelMediatorImplMock;

    /**
     * @test
     * @expectedException \Exception
     */
    public function fileConfigNotExist_ThrowException(): void
    {
        TestClassUtil::invokeMethod('loadConfigParameters', new ViewModelsCommand());
    }

    /**
     * @test
     */
    public function executeCommand_withoutArguments(): void
    {
        ViewModelMediatorMock::$fileObjects = $this->writeFileObjects(ViewModelMediatorMock::$fileObjects);

        $this->commandTester->execute(
            [
                'command'    => $this->commandMock->getName(),
                'class-name' => FunctionalEntityResponse::class,
            ]
        );

        $this->assertCommandFileGeneratedOutput(ViewModelMediatorMock::$fileObjects);
    }

    /**
     * @test
     */
    public function executeCommand_withNoTestsArguments(): void
    {
        ViewModelMediatorMock::$fileObjects = $this->writeFileObjects(ViewModelMediatorMock::$fileObjects);

        $this->commandTester->execute(
            [
                'command'    => $this->commandMock->getName(),
                'class-name' => FunctionalEntityResponse::class,
                '--no-test'  => null,
            ]
        );

        $this->assertCommandFileGeneratedOutput(ViewModelMediatorMock::$fileObjects);
    }

    /**
     * @test
     */
    public function executeCommand_withTestOnlyArguments(): void
    {
        ViewModelMediatorMock::$fileObjects = $this->writeFileObjects(ViewModelMediatorMock::$fileObjects);

        $this->commandTester->execute(
            [
                'command'      => $this->commandMock->getName(),
                'class-name'   => FunctionalEntityResponse::class,
                '--tests-only' => null,
            ]
        );

        $this->assertCommandFileGeneratedOutput(ViewModelMediatorMock::$fileObjects);
    }

    /**
     * @test
     */
    public function executeCommand_whenFileAlreadyExist(): void
    {
        ViewModelMediatorMock::$fileObjects = $this->alreadyExistFileObject(ViewModelMediatorMock::$fileObjects);

        $this->commandTester->execute(
            [
                'command'    => $this->commandMock->getName(),
                'class-name' => FunctionalEntityResponse::class,
            ]
        );

        $output = $this->commandTester->getDisplay();

        foreach (ViewModelMediatorMock::$fileObjects as $fileObject) {
            $this->assertContains(CommandLabelType::ALREADY_EXIST_OUTPUT, $output);
            $this->assertContains($fileObject->getPath(), $output);
            $this->assertContains($fileObject->getContent(), $output);
        }
    }

    /**
     * @test
     */
    public function executeCommand_withDumpArguments(): void
    {
        $this->commandTester->execute(
            [
                'command'    => $this->commandMock->getName(),
                'class-name' => FunctionalEntityResponse::class,
                '--dump'     => null,
            ]
        );

        $output = $this->commandTester->getDisplay();

        foreach (ViewModelMediatorMock::$fileObjects as $fileObject) {
            $this->assertContains(CommandLabelType::DUMP_OUTPUT, $output);
            $this->assertContains($fileObject->getPath(), $output);
            $this->assertContains($fileObject->getContent(), $output);
        }
    }

    /**
     * @test
     * @expectedException \ErrorException
     */
    public function checkConfiguration_OneParameterEmpty(): void
    {
        $codeGeneratorConfig = [
            'parameters' => [
                'author' => null,
            ],
        ];

        TestClassUtil::invokeMethod('checkConfiguration', $this->commandMock, $codeGeneratorConfig);
    }

    /**
     * @test
     * @expectedException \ErrorException
     */
    public function checkConfiguration_ManyParametersEmpty(): void
    {
        $codeGeneratorConfig = [
            'parameters' => [
                'author'      => null,
                'author_mail' => null,
            ],
        ];

        TestClassUtil::invokeMethod('checkConfiguration', $this->commandMock, $codeGeneratorConfig);
    }

    protected function setUp(): void
    {
        $this->commandMock = new ViewModelsCommandMock();
        $this->application = new Application();
        $this->application->add($this->commandMock);
        $this->commandTester = new CommandTester($this->commandMock);
        $this->viewModelMediatorImplMock = new ViewModelMediatorMock();
        $this->container = new ContainerMock(
            ['open_classrooms.code_generator.mediators.api.view_model_mediator' => $this->viewModelMediatorImplMock]
        );
        TestClassUtil::setProperty('container', $this->container, $this->commandMock);
    }
}

