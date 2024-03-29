<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\GenericUseCaseMediator;
use OpenClassrooms\CodeGenerator\Mediators\Options;

class GenericUseCaseMediatorImpl implements GenericUseCaseMediator
{
    use GenericUseCaseGeneratorsTrait;

    private FileObjectGateway $fileObjectGateway;

    /**
     * @return FileObject[]
     */
    public function mediate(array $args = [], array $options = []): array
    {
        $domain = $args[Args::DOMAIN];
        $useCase = $args[Args::USE_CASE];

        if (false !== $options[Options::NO_TEST]) {
            $fileObjects = $this->generateSources($domain, $useCase);
        } elseif (false !== $options[Options::TESTS_ONLY]) {
            $fileObjects[] = $this->generateGenericUseCaseTest($domain, $useCase);
        } else {
            $sourcesFileObjects = $this->generateSources($domain, $useCase);
            $testsFileObjects[] = $this->generateGenericUseCaseTest($domain, $useCase);
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
    private function generateSources(string $domain, string $useCase): array
    {
        $fileObjects[] = $this->generateGenericUseCase($domain, $useCase);

        return $fileObjects;
    }

    public function setFileObjectGateway(FileObjectGateway $fileObjectGateway): void
    {
        $this->fileObjectGateway = $fileObjectGateway;
    }
}
