<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Commands;

use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl\UseCaseMediatorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Commands\GenericUseCaseCommandMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\GenericUseCaseRequestBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\GenericUseCaseRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GenericUseCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GenericUseCaseRequestBuilderImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GenericUseCaseRequestDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\UseCases\GenericUseCaseTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\MockObject\InvocationMocker;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GenericUseCaseCommandTest extends AbstractCommandTest
{
    const DOMAIN = 'Domain\SubDomain';

    const GENERIC_USE_CASE = 'GenericUseCase';

    /**
     * @var GenericUseCaseCommandMock
     */
    protected $commandMock;

    /**
     * @var InvocationMocker|\PHPUnit_Framework_MockObject_MockObject
     */
    private $useCaseMediatorImplMock;

    /**
     * @test
     */
    public function executeCommand_withArguments()
    {
        $writtenFileObjects = $this->writeFileObjects($this->stubNotWrittenFileObjectProvider());
        $this->useCaseMediatorImplMock->method('mediate')->willReturn($writtenFileObjects);
        $this->container->method('get')->willReturn($this->useCaseMediatorImplMock);

        $this->commandTester->execute(
            [
                'command'      => $this->commandMock->getName(),
                Args::DOMAIN   => self::DOMAIN,
                Args::USE_CASE => self::GENERIC_USE_CASE,
            ]
        );

        $this->assertCommandFileGeneratedOutput($writtenFileObjects);

    }

    private function stubNotWrittenFileObjectProvider()
    {
        return [
            new GenericUseCaseFileObjectStub1(),
            new GenericUseCaseRequestBuilderFileObjectStub1(),
            new GenericUseCaseRequestBuilderImplFileObjectStub1(),
            new GenericUseCaseRequestDTOFileObjectStub1(),
            new GenericUseCaseRequestFileObjectStub1(),
            new GenericUseCaseTestFileObjectStub1(),
        ];
    }

    /**
     * @test
     */
    public function executeCommand_withoutArguments()
    {
        $writtenFileObjects = $this->writeFileObjects($this->stubNotWrittenFileObjectProvider());
        $this->useCaseMediatorImplMock->method('mediate')->willReturn($writtenFileObjects);
        $this->container->method('get')->willReturn($this->useCaseMediatorImplMock);

        $this->commandTester->setInputs(
            [
                Args::DOMAIN   => self::DOMAIN,
                Args::USE_CASE => self::GENERIC_USE_CASE,
            ]
        );
        $this->commandTester->execute(
            [
                'command' => $this->commandMock->getName(),
            ]
        );

        $this->assertCommandFileGeneratedOutput($writtenFileObjects);

    }

    protected function setUp()
    {
        $this->commandMock = new GenericUseCaseCommandMock();
        $this->application = new Application();
        $this->application->add($this->commandMock);
        $this->commandTester = new CommandTester($this->commandMock);
        $this->container = $this->createMock(ContainerBuilder::class);
        $this->useCaseMediatorImplMock = $this->createMock(UseCaseMediatorImpl::class);
        TestClassUtil::setProperty('container', $this->container, $this->commandMock);
    }
}

