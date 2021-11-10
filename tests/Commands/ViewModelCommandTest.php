<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Commands;

use OpenClassrooms\CodeGenerator\Commands\CommandLabelType;
use OpenClassrooms\CodeGenerator\Commands\Presentation\ViewModelsCommand;
use OpenClassrooms\CodeGenerator\Mediators\Api\ViewModels\ViewModelMediator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Commands\ViewModelsCommandMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators\ViewModelMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Symfony\Component\DependencyInjection\ContainerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class ViewModelCommandTest extends TestCase
{
    use CommandTestCase;

    /**
     * @var ViewModelsCommand
     */
    protected $command;

    /**
     * @var ViewModelMediator
     */
    private $viewModelMediator;

    /**
     * @test
     */
    public function checkConfigurationManyParametersEmpty(): void
    {
        $this->expectException(\ErrorException::class);

        $codeGeneratorConfig = [
            'parameters' => [
                'author'      => null,
                'author_mail' => null,
            ],
        ];

        TestClassUtil::invokeMethod('checkConfiguration', $this->command, $codeGeneratorConfig);
    }

    /**
     * @test
     */
    public function checkConfigurationOneParameterEmpty(): void
    {
        $this->expectException(\ErrorException::class);

        $codeGeneratorConfig = [
            'parameters' => [
                'author' => null,
            ],
        ];

        TestClassUtil::invokeMethod('checkConfiguration', $this->command, $codeGeneratorConfig);
    }

    /**
     * @test
     */
    public function executeCommandWhenFileAlreadyExist(): void
    {
        ViewModelMediatorMock::$fileObjects = $this->alreadyExistFileObject(ViewModelMediatorMock::$fileObjects);

        $this->commandTester->execute(
            [
                'command'    => $this->command->getName(),
                'class-name' => FunctionalEntityResponse::class,
            ]
        );

        $output = $this->commandTester->getDisplay();

        foreach (ViewModelMediatorMock::$fileObjects as $fileObject) {
            $this->assertStringContainsString(CommandLabelType::ALREADY_EXIST_OUTPUT, $output);
            $this->assertStringContainsString($fileObject->getPath(), $output);
            $this->assertStringContainsString($fileObject->getContent(), $output);
        }
    }

    /**
     * @test
     */
    public function executeCommandWithDumpArguments(): void
    {
        $this->commandTester->execute(
            [
                'command'    => $this->command->getName(),
                'class-name' => FunctionalEntityResponse::class,
                '--dump'     => null,
            ]
        );

        $output = $this->commandTester->getDisplay();

        foreach (ViewModelMediatorMock::$fileObjects as $fileObject) {
            $this->assertStringContainsString(CommandLabelType::DUMP_OUTPUT, $output);
            $this->assertStringContainsString($fileObject->getPath(), $output);
            $this->assertStringContainsString($fileObject->getContent(), $output);
        }
    }

    /**
     * @test
     */
    public function executeCommandWithNoTestsArguments(): void
    {
        ViewModelMediatorMock::$fileObjects = $this->writeFileObjects(ViewModelMediatorMock::$fileObjects);

        $this->commandTester->execute(
            [
                'command'    => $this->command->getName(),
                'class-name' => FunctionalEntityResponse::class,
                '--no-test'  => null,
            ]
        );

        $this->assertCommandFileGeneratedOutput(ViewModelMediatorMock::$fileObjects);
    }

    /**
     * @test
     */
    public function executeCommandWithoutArguments(): void
    {
        ViewModelMediatorMock::$fileObjects = $this->writeFileObjects(ViewModelMediatorMock::$fileObjects);

        $this->commandTester->execute(
            [
                'command'    => $this->command->getName(),
                'class-name' => FunctionalEntityResponse::class,
            ]
        );

        $this->assertCommandFileGeneratedOutput(ViewModelMediatorMock::$fileObjects);
    }

    /**
     * @test
     */
    public function executeCommandWithTestOnlyArguments(): void
    {
        ViewModelMediatorMock::$fileObjects = $this->writeFileObjects(ViewModelMediatorMock::$fileObjects);

        $this->commandTester->execute(
            [
                'command'      => $this->command->getName(),
                'class-name'   => FunctionalEntityResponse::class,
                '--tests-only' => null,
            ]
        );

        $this->assertCommandFileGeneratedOutput(ViewModelMediatorMock::$fileObjects);
    }

    /**
     * @test
     */
    public function fileConfigNotExistThrowException(): void
    {
        $this->expectException(\Exception::class);

        TestClassUtil::invokeMethod('loadConfigParameters', new ViewModelsCommand());
    }

    protected function setUp(): void
    {
        $this->command = new ViewModelsCommandMock();
        $this->application = new Application();
        $this->application->add($this->command);
        $this->commandTester = new CommandTester($this->command);
        $this->viewModelMediator = new ViewModelMediatorMock();
        $this->container = new ContainerMock(
            ['open_classrooms.code_generator.mediators.api.view_model_mediator' => $this->viewModelMediator]
        );
        TestClassUtil::setProperty('container', $this->container, $this->command);
    }
}

