<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\GenerateGenerator\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\Request\GenerateGeneratorGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\GenerateGeneratorGenerator;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use OpenClassrooms\CodeGenerator\Mediators\GenerateGenerator\GenerateGeneratorMediator;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenerateGeneratorMediatorImpl implements GenerateGeneratorMediator
{
    /**
     * @var FileObjectGateway
     */
    private $fileObjectGateway;

    /**
     * @var GenerateGeneratorGenerator
     */
    private $selfGeneratorGenerator;

    /**
     * @var GenerateGeneratorGeneratorRequestBuilder
     */
    private $selfGeneratorGeneratorRequestBuilder;

    public function mediate(array $args = [], array $options = []): array
    {
        $domain = $args[Args::DOMAIN];
        $entity = $args[Args::ENTITY];

        $fileObjects = $this->generateGenerateGeneratorFileObjects($domain, $entity);

        if (false === $options[Options::DUMP]) {
            $this->fileObjectGateway->flush();
        }

        return $fileObjects;
    }

    /**
     * @return FileObject[]
     */
    private function generateGenerateGeneratorFileObjects(string $domain, string $entity): array
    {
        return $this->selfGeneratorGenerator->generate(
            $this->selfGeneratorGeneratorRequestBuilder->create()->withDomain($domain)->withEntity($entity)->build()
        );
    }

    public function setFileObjectGateway(FileObjectGateway $fileObjectGateway): void
    {
        $this->fileObjectGateway = $fileObjectGateway;
    }

    public function setGenerateGeneratorGenerator(GenerateGeneratorGenerator $selfGeneratorGenerator): void
    {
        $this->selfGeneratorGenerator = $selfGeneratorGenerator;
    }

    public function setGenerateGeneratorGeneratorRequestBuilder(
        GenerateGeneratorGeneratorRequestBuilder $selfGeneratorGeneratorRequestBuilder
    ): void
    {
        $this->selfGeneratorGeneratorRequestBuilder = $selfGeneratorGeneratorRequestBuilder;
    }
}
