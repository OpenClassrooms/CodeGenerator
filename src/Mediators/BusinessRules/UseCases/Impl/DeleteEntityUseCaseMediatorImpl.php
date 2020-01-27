<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\DeleteEntityUseCaseMediator;
use OpenClassrooms\CodeGenerator\Mediators\Options;

class DeleteEntityUseCaseMediatorImpl implements DeleteEntityUseCaseMediator
{
    use DeleteEntityUseCaseGeneratorsTrait;

    /**
     * @var FileObjectGateway
     */
    private $fileObjectGateway;

    public function mediate(array $args = [], array $options = []): array
    {
        $className = $args[Args::CLASS_NAME];

        if (false !== $options[Options::NO_TEST]) {
            $fileObjects = $this->generateSources($className);
        } elseif (false !== $options[Options::TESTS_ONLY]) {
            $fileObjects = $this->generateTestSource($className);
        } else {
            $sourcesFileObjects = $this->generateSources($className);
            $testsFileObjects = $this->generateTestSource($className);
            $fileObjects = array_merge($sourcesFileObjects, $testsFileObjects);
        }
        if (false === $options[Options::DUMP]) {
            $this->fileObjectGateway->flush();
        }

        return $fileObjects;
    }

    /**
     * @return FileObject[]
     */
    protected function generateSources(string $className): array
    {
        $fileObjects[] = $this->generateDeleteEntityUseCaseGenerator($className);
        $fileObjects[] = $this->generateDeleteEntityUseCaseRequestBuilderGenerator($className);
        $fileObjects[] = $this->generateDeleteEntityUseCaseRequestBuilderImplGenerator($className);
        $fileObjects[] = $this->generateDeleteEntityUseCaseRequestDTOGenerator($className);
        $fileObjects[] = $this->generateDeleteEntityUseCaseRequestGenerator($className);

        return $fileObjects;
    }

    /**
     * @return FileObject[]
     */
    protected function generateTestSource(string $className): array
    {
        $fileObject[] = $this->generateDeleteEntityUseCaseTestGenerator($className);

        return $fileObject;
    }

    public function setFileObjectGateway(FileObjectGateway $fileObjectGateway): void
    {
        $this->fileObjectGateway = $fileObjectGateway;
    }
}
