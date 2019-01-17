<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\tests\Commands;

use OpenClassrooms\CodeGenerator\Commands\CommandLabelType;
use OpenClassrooms\CodeGenerator\Commands\ViewModelCommand;
use OpenClassrooms\CodeGenerator\Mediators\Api\Impl\ViewModelMediatorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModel\ViewModelFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelDetail\ViewModelDetailFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelDetailImpl\ViewModelDetailImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelListItem\ViewModelListItemFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelListItemImpl\ViewModelListItemImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityResponseDTO;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\DependencyInjection\Container;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelCommandTest extends TestCase
{
    /**
     * @var Application
     */
    private $application;

    /**
     * @var CommandTester
     */
    private $commandTester;

    /**
     * @var Container
     */
    private $container;

    /**
     * @var ViewModelMediatorImpl
     */
    private $viewModelMediatorImplMock;

    /**
     * @var ViewModelCommand
     */
    private $viewModelCommand;

    /**
     * @test
     */
    public function executeCommand_withoutArguments()
    {
        $this->viewModelMediatorImplMock->method('mediate')->willReturn($this->stubWrittenFileObjectProvider());
        $this->container->method('get')->willReturn($this->viewModelMediatorImplMock);

        $this->commandTester->execute(
            [
                'command'    => $this->viewModelCommand->getName(),
                'class-name' => FunctionalEntityResponseDTO::class,
            ]
        );

        $output = $this->commandTester->getDisplay();

        foreach ($this->stubWrittenFileObjectProvider() as $fileObject) {
            $this->assertContains(CommandLabelType::GENERATED_OUTPUT, $output);
            $this->assertContains($fileObject->getPath(), $output);
            $this->assertNotContains($fileObject->getContent(), $output);
        }

    }

    private function stubWrittenFileObjectProvider()
    {
        $fileObjects = [];
        foreach ($this->stubNotWrittenFileObjectProvider() as $fileObject) {
            $fileObject->write();
            $fileObjects[] = $fileObject;
        }

        return $fileObjects;
    }

    private function stubNotWrittenFileObjectProvider()
    {
        return [
            new ViewModelFileObjectStub1(),
            new ViewModelDetailFileObjectStub1(),
            new ViewModelDetailImplFileObjectStub1(),
            new ViewModelListItemFileObjectStub1(),
            new ViewModelListItemImplFileObjectStub1(),
        ];
    }

    /**
     * @test
     */
    public function executeCommand_withNoTestsArguments()
    {
        $this->viewModelMediatorImplMock->method('mediate')->willReturn($this->stubWrittenFileObjectProvider());
        $this->container->method('get')->willReturn($this->viewModelMediatorImplMock);

        $this->commandTester->execute(
            [
                'command'    => $this->viewModelCommand->getName(),
                'class-name' => FunctionalEntityResponseDTO::class,
                '--no-test'  => null,
            ]
        );

        $output = $this->commandTester->getDisplay();

        foreach ($this->stubWrittenFileObjectProvider() as $fileObject) {
            $this->assertContains(CommandLabelType::GENERATED_OUTPUT, $output);
            $this->assertContains($fileObject->getPath(), $output);
            $this->assertNotContains($fileObject->getContent(), $output);

        }

    }

    /**
     * @test
     */
    public function executeCommand_withTestOnlyArguments()
    {
        $this->viewModelMediatorImplMock->method('mediate')->willReturn($this->stubWrittenFileObjectProvider());
        $this->container->method('get')->willReturn($this->viewModelMediatorImplMock);

        $this->commandTester->execute(
            [
                'command'      => $this->viewModelCommand->getName(),
                'class-name'   => FunctionalEntityResponseDTO::class,
                '--tests-only' => null,
            ]
        );

        $output = $this->commandTester->getDisplay();

        foreach ($this->stubWrittenFileObjectProvider() as $fileObject) {
            $this->assertContains(CommandLabelType::GENERATED_OUTPUT, $output);
            $this->assertContains($fileObject->getPath(), $output);
            $this->assertNotContains($fileObject->getContent(), $output);
        }

    }

    /**
     * @test
     */
    public function executeCommand_whenFileAlreadyExist()
    {
        $this->viewModelMediatorImplMock->method('mediate')->willReturn($this->stubNotWrittenFileObjectProvider());
        $this->container->method('get')->willReturn($this->viewModelMediatorImplMock);

        $this->commandTester->execute(
            [
                'command'    => $this->viewModelCommand->getName(),
                'class-name' => FunctionalEntityResponseDTO::class,
            ]
        );

        $output = $this->commandTester->getDisplay();

        foreach ($this->stubNotWrittenFileObjectProvider() as $fileObject) {
            $this->assertContains(CommandLabelType::ALREADY_EXIST_OUTPUT, $output);
            $this->assertContains($fileObject->getPath(), $output);
            $this->assertContains($fileObject->getContent(), $output);
        }

    }

    /**
     * @test
     */
    public function executeCommand_withDumpArguments()
    {
        $this->viewModelMediatorImplMock->method('mediate')->willReturn($this->stubNotWrittenFileObjectProvider());
        $this->container->method('get')->willReturn($this->viewModelMediatorImplMock);

        $this->commandTester->execute(
            [
                'command'    => $this->viewModelCommand->getName(),
                'class-name' => FunctionalEntityResponseDTO::class,
                '--dump'     => null,
            ]
        );

        $output = $this->commandTester->getDisplay();

        foreach ($this->stubNotWrittenFileObjectProvider() as $fileObject) {
            $this->assertContains(CommandLabelType::DUMP_OUTPUT, $output);
            $this->assertContains($fileObject->getPath(), $output);
            $this->assertContains($fileObject->getContent(), $output);

        }

    }

    protected function setUp()
    {
        $this->viewModelCommand = new ViewModelCommand();
        $this->application = new Application();
        $this->application->add($this->viewModelCommand);
        $this->commandTester = new CommandTester($this->viewModelCommand);
        $this->container = $this->createMock(Container::class);
        $this->viewModelMediatorImplMock = $this->createMock(ViewModelMediatorImpl::class);
        TestClassUtil::setProperty('container', $this->container, $this->viewModelCommand);
    }
}
