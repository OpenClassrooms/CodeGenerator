<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\Api\Controller\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\DeleteEntityControllerGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\GetEntitiesControllerGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\GetEntityControllerGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\PatchEntityControllerGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\PostEntityControllerGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\DeleteEntityControllerGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\GetEntitiesControllerGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\GetEntityControllerGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\PatchEntityControllerGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\PostEntityControllerGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Mediators\Api\Controller\ControllerMediator;

class ControllerMediatorImpl implements ControllerMediator
{
    /** @var DeleteEntityControllerGenerator */
    private $deleteEntityControllerGenerator;

    /** @var DeleteEntityControllerGeneratorRequestBuilder */
    private $deleteEntityControllerGeneratorRequestBuilder;

    /** @var GetEntitiesControllerGenerator */
    private $getEntitiesControllerGenerator;

    /** @var GetEntitiesControllerGeneratorRequestBuilder */
    private $getEntitiesControllerGeneratorRequestBuilder;

    /** @var GetEntityControllerGenerator */
    private $getEntityControllerGenerator;

    /** @var GetEntityControllerGeneratorRequestBuilder */
    private $getEntityControllerGeneratorRequestBuilder;

    /** @var PatchEntityControllerGenerator */
    private $patchEntityControllerGenerator;

    /** @var PatchEntityControllerGeneratorRequestBuilder */
    private $patchEntityControllerGeneratorRequestBuilder;

    /** @var PostEntityControllerGenerator */
    private $postEntityControllerGenerator;

    /** @var PostEntityControllerGeneratorRequestBuilder */
    private $postEntityControllerGeneratorRequestBuilder;

    public function generateDeleteEntityControllerGenerator(string $className): FileObject
    {
        return $this->deleteEntityControllerGenerator->generate(
            $this->deleteEntityControllerGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    public function generateGetEntitiesControllerGenerator(string $className): FileObject
    {
        return $this->getEntitiesControllerGenerator->generate(
            $this->getEntitiesControllerGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    public function generateGetEntityControllerGenerator(string $className): FileObject
    {
        return $this->getEntityControllerGenerator->generate(
            $this->getEntityControllerGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    public function generatePatchEntityControllerGenerator(string $className): FileObject
    {
        return $this->patchEntityControllerGenerator->generate(
            $this->patchEntityControllerGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    public function generatePostEntityControllerGenerator(string $className): FileObject
    {
        return $this->postEntityControllerGenerator->generate(
            $this->postEntityControllerGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    public function setDeleteEntityControllerGenerator(
        Generator $deleteEntityControllerGenerator
    ): void {
        $this->deleteEntityControllerGenerator = $deleteEntityControllerGenerator;
    }

    public function setDeleteEntityControllerGeneratorRequestBuilder(
        DeleteEntityControllerGeneratorRequestBuilder $deleteEntityControllerGeneratorRequestBuilder
    ): void {
        $this->deleteEntityControllerGeneratorRequestBuilder = $deleteEntityControllerGeneratorRequestBuilder;
    }

    public function setGetEntitiesControllerGenerator(
        Generator $getEntitiesControllerGenerator
    ): void {
        $this->getEntitiesControllerGenerator = $getEntitiesControllerGenerator;
    }

    public function setGetEntitiesControllerGeneratorRequestBuilder(
        GetEntitiesControllerGeneratorRequestBuilder $getEntitiesControllerGeneratorRequestBuilder
    ): void {
        $this->getEntitiesControllerGeneratorRequestBuilder = $getEntitiesControllerGeneratorRequestBuilder;
    }

    public function setGetEntityControllerGenerator(Generator $getEntityControllerGenerator): void
    {
        $this->getEntityControllerGenerator = $getEntityControllerGenerator;
    }

    public function setGetEntityControllerGeneratorRequestBuilder(
        GetEntityControllerGeneratorRequestBuilder $getEntityControllerGeneratorRequestBuilder
    ): void {
        $this->getEntityControllerGeneratorRequestBuilder = $getEntityControllerGeneratorRequestBuilder;
    }

    public function setPatchEntityControllerGenerator(
        Generator $patchEntityControllerGenerator
    ): void {
        $this->patchEntityControllerGenerator = $patchEntityControllerGenerator;
    }

    public function setPatchEntityControllerGeneratorRequestBuilder(
        PatchEntityControllerGeneratorRequestBuilder $patchEntityControllerGeneratorRequestBuilder
    ): void {
        $this->patchEntityControllerGeneratorRequestBuilder = $patchEntityControllerGeneratorRequestBuilder;
    }

    public function setPostEntityControllerGenerator(Generator $postEntityControllerGenerator): void
    {
        $this->postEntityControllerGenerator = $postEntityControllerGenerator;
    }

    public function setPostEntityControllerGeneratorRequestBuilder(
        PostEntityControllerGeneratorRequestBuilder $postEntityControllerGeneratorRequestBuilder
    ): void {
        $this->postEntityControllerGeneratorRequestBuilder = $postEntityControllerGeneratorRequestBuilder;
    }
}
