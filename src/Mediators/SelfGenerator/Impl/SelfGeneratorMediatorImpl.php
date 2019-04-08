<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\SelfGenerator\Impl;

use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Generator\SelfGenerator\Request\SelfGeneratorGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\SelfGenerator\SelfGeneratorGenerator;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use OpenClassrooms\CodeGenerator\Mediators\SelfGenerator\SelfGeneratorMediator;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class SelfGeneratorMediatorImpl implements SelfGeneratorMediator
{
    /**
     * @var FileObjectGateway
     */
    private $fileObjectGateway;

    /**
     * @var SelfGeneratorGenerator
     */
    private $selfGeneratorGenerator;

    /**
     * @var SelfGeneratorGeneratorRequestBuilder
     */
    private $selfGeneratorGeneratorRequestBuilder;

    public function mediate(array $args = [], array $options = []): array
    {
        $domain = $args[Args::DOMAIN];
        $entity = $args[Args::ENTITY];

        $fileObjects = $this->generateSelfGeneratorFileObjects($domain, $entity);

        if (false === $options[Options::DUMP]) {
            $this->fileObjectGateway->flush();
        }

        return $fileObjects;
    }

    private function generateSelfGeneratorFileObjects(string $domain, string $entity)
    {
        return $this->selfGeneratorGenerator->generate(
            $this->selfGeneratorGeneratorRequestBuilder->create()->withDomain($domain)->withEntity($entity)->build()
        );
    }

    public function setFileObjectGateway(FileObjectGateway $fileObjectGateway): void
    {
        $this->fileObjectGateway = $fileObjectGateway;
    }

    public function setSelfGeneratorGenerator(SelfGeneratorGenerator $selfGeneratorGenerator): void
    {
        $this->selfGeneratorGenerator = $selfGeneratorGenerator;
    }

    public function setSelfGeneratorGeneratorRequestBuilder(
        SelfGeneratorGeneratorRequestBuilder $selfGeneratorGeneratorRequestBuilder
    ): void
    {
        $this->selfGeneratorGeneratorRequestBuilder = $selfGeneratorGeneratorRequestBuilder;
    }
}
