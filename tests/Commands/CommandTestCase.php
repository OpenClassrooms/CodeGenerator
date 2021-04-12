<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Commands;

use OpenClassrooms\CodeGenerator\Commands\CommandLabelType;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Symfony\Component\DependencyInjection\ContainerMock;
use PHPUnit\Framework\MockObject\Builder\InvocationMocker;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

trait CommandTestCase
{
    protected Application $application;

    protected CommandTester $commandTester;

    /**
     * @var InvocationMocker|ContainerMock
     */
    protected $container;

    /**
     * @param FileObject[]
     */
    public function alreadyExistFileObject(array $fileObjects): array
    {
        return array_map(
            static function (FileObject $fileObject) {
                $otherFileObject = clone $fileObject;
                $otherFileObject->setAlreadyExists(true);

                return $otherFileObject;
            },
            $fileObjects
        );
    }

    /**
     * @param FileObject[]
     */
    protected function assertCommandFileGeneratedOutput(array $writtenFileObjects): void
    {
        $output = $this->commandTester->getDisplay();

        foreach ($writtenFileObjects as $fileObject) {
            $this->assertContains(CommandLabelType::GENERATED_OUTPUT, $output);
            $this->assertContains($fileObject->getPath(), $output);
            $this->assertNotContains($fileObject->getContent(), $output);
        }
    }

    /**
     * @param FileObject[]
     */
    protected function writeFileObjects(array $fileObjects): array
    {
        return array_map(
            static function (FileObject $fileObject) {
                $otherFileObject = clone $fileObject;
                $otherFileObject->write();

                return $otherFileObject;
            },
            $fileObjects
        );
    }
}
