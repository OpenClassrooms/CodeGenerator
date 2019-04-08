<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Commands;

use OpenClassrooms\CodeGenerator\Commands\CommandLabelType;
use OpenClassrooms\CodeGenerator\Commands\ViewModelsCommand;
use OpenClassrooms\CodeGenerator\Mediators\Api\Impl\ViewModelMediatorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Commands\ViewModelsCommandMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModel\ViewModelFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelDetail\ViewModelDetailFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelDetailImpl\ViewModelDetailImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelListItem\ViewModelListItemFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelListItemImpl\ViewModelListItemImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityResponseDTO;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\MockObject\Builder\InvocationMocker;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelCommandTest extends AbstractCommandTest
{
    /**
     * @var ViewModelsCommandMock
     */
    protected $commandMock;

    /**
     * @var InvocationMocker
     */
    private $viewModelMediatorImplMock;

    /**
     * @test
     * @expectedException \Exception
     */
    public function fileConfigNotExist_ThrowException()
    {
        TestClassUtil::invokeMethod('loadConfigParameters', new ViewModelsCommand());
    }

    /**
     * @test
     */
    public function executeCommand_withoutArguments()
    {
        $writtenFileObjects = $this->writeFileObjects($this->stubNotWrittenFileObjectProvider());
        $this->viewModelMediatorImplMock->method('mediate')->willReturn($writtenFileObjects);
        $this->container->method('get')->willReturn($this->viewModelMediatorImplMock);

        $this->commandTester->execute(
            [
                'command'    => $this->commandMock->getName(),
                'class-name' => FunctionalEntityResponseDTO::class,
            ]
        );

        $this->assertCommandFileGeneratedOutput($writtenFileObjects);
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
        $writtenFileObjects = $this->writeFileObjects($this->stubNotWrittenFileObjectProvider());
        $this->viewModelMediatorImplMock->method('mediate')->willReturn($writtenFileObjects);
        $this->container->method('get')->willReturn($this->viewModelMediatorImplMock);

        $this->commandTester->execute(
            [
                'command'    => $this->commandMock->getName(),
                'class-name' => FunctionalEntityResponseDTO::class,
                '--no-test'  => null,
            ]
        );

        $this->assertCommandFileGeneratedOutput($writtenFileObjects);
    }

    /**
     * @test
     */
    public function executeCommand_withTestOnlyArguments()
    {
        $writtenFileObjects = $this->writeFileObjects($this->stubNotWrittenFileObjectProvider());
        $this->viewModelMediatorImplMock->method('mediate')->willReturn($writtenFileObjects);
        $this->container->method('get')->willReturn($this->viewModelMediatorImplMock);

        $this->commandTester->execute(
            [
                'command'      => $this->commandMock->getName(),
                'class-name'   => FunctionalEntityResponseDTO::class,
                '--tests-only' => null,
            ]
        );

        $this->assertCommandFileGeneratedOutput($writtenFileObjects);
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
                'command'    => $this->commandMock->getName(),
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
                'command'    => $this->commandMock->getName(),
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

    /**
     * @test
     * @expectedException \ErrorException
     */
    public function checkConfiguration_OneParameterEmpty()
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
    public function checkConfiguration_ManyParametersEmpty()
    {
        $codeGeneratorConfig = [
            'parameters' => [
                'author'      => null,
                'author_mail' => null,
            ],
        ];

        TestClassUtil::invokeMethod('checkConfiguration', $this->commandMock, $codeGeneratorConfig);
    }

    protected function setUp()
    {
        $this->commandMock = new ViewModelsCommandMock();
        $this->application = new Application();
        $this->application->add($this->commandMock);
        $this->commandTester = new CommandTester($this->commandMock);
        $this->container = $this->createMock(ContainerBuilder::class);
        $this->viewModelMediatorImplMock = $this->createMock(ViewModelMediatorImpl::class);
        TestClassUtil::setProperty('container', $this->container, $this->commandMock);
    }
}

