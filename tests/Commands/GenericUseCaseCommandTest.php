<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Commands;

use OpenClassrooms\CodeGenerator\Commands\UseCases\GenericUseCaseCommand;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\UseCaseMediator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Commands\GenericUseCaseCommandMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators\UseCaseMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Symfony\Component\DependencyInjection\ContainerMock;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class GenericUseCaseCommandTest extends TestCase
{
    use CommandTestCase;

    const DOMAIN           = 'Domain\SubDomain';

    const GENERIC_USE_CASE = 'GenericUseCase';

    /**
     * @var GenericUseCaseCommand
     */
    protected $command;

    /**
     * @var UseCaseMediator
     */
    private $useCaseMediator;

    /**
     * @test
     */
    public function executeCommandWithArguments(): void
    {
        UseCaseMediatorMock::$fileObjects = $this->writeFileObjects(UseCaseMediatorMock::$fileObjects);

        $this->commandTester->execute(
            [
                'command'      => $this->command->getName(),
                Args::DOMAIN   => self::DOMAIN,
                Args::USE_CASE => self::GENERIC_USE_CASE,
            ]
        );

        $this->assertCommandFileGeneratedOutput(UseCaseMediatorMock::$fileObjects);
    }

    /**
     * @test
     */
    public function executeCommandWithoutArguments(): void
    {
        UseCaseMediatorMock::$fileObjects = $this->writeFileObjects(UseCaseMediatorMock::$fileObjects);

        $this->commandTester->setInputs(
            [
                Args::DOMAIN   => self::DOMAIN,
                Args::USE_CASE => self::GENERIC_USE_CASE,
            ]
        );
        $this->commandTester->execute(
            [
                'command' => $this->command->getName(),
            ]
        );

        $this->assertCommandFileGeneratedOutput(UseCaseMediatorMock::$fileObjects);
    }

    protected function setUp(): void
    {
        $this->command = new GenericUseCaseCommandMock();
        $this->application = new Application();
        $this->application->add($this->command);
        $this->commandTester = new CommandTester($this->command);
        $this->useCaseMediator = new UseCaseMediatorMock();
        $this->container = new ContainerMock(
            ['open_classrooms.code_generator.mediators.business_rules.use_case_mediator' => $this->useCaseMediator]

        );
        TestClassUtil::setProperty('container', $this->container, $this->command);
    }
}

