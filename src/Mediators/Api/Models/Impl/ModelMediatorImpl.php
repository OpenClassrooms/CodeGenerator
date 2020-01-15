<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\Api\Models\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\EntityModelTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\PatchEntityModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\PostEntityModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\Request\EntityModelTraitGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\Request\PatchEntityModelGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\Request\PostEntityModelGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Mediators\Api\Models\ModelMediator;

class ModelMediatorImpl implements ModelMediator
{
    /** @var PatchEntityModelGenerator */
    private $patchEntityModelGenerator;

    /** @var PatchEntityModelGeneratorRequestBuilder */
    private $patchEntityModelGeneratorRequestBuilder;

    /** @var EntityModelTraitGenerator */
    private $entityModelTraitGenerator;

    /** @var EntityModelTraitGeneratorRequestBuilder */
    private $entityModelTraitGeneratorRequestBuilder;

    /** @var PostEntityModelGenerator */
    private $postEntityModelGenerator;

    /** @var PostEntityModelGeneratorRequestBuilder */
    private $postEntityModelGeneratorRequestBuilder;

    public function generateEntityModelTraitGenerator(string $className): FileObject
    {
        return $this->entityModelTraitGenerator->generate(
            $this->entityModelTraitGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    public function generatePatchEntityModelGenerator(string $className): FileObject
    {
        return $this->patchEntityModelGenerator->generate(
            $this->patchEntityModelGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    public function generatePostEntityModelGenerator(string $className): FileObject
    {
        return $this->postEntityModelGenerator->generate(
            $this->postEntityModelGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    public function setPatchEntityModelGenerator(Generator $patchEntityModelGenerator): void
    {
        $this->patchEntityModelGenerator = $patchEntityModelGenerator;
    }

    public function setPatchEntityModelGeneratorRequestBuilder(
        PatchEntityModelGeneratorRequestBuilder $patchEntityModelGeneratorRequestBuilder
    ): void {
        $this->patchEntityModelGeneratorRequestBuilder = $patchEntityModelGeneratorRequestBuilder;
    }

    public function setEntityModelTraitGenerator(Generator $entityModelTraitGenerator): void
    {
        $this->entityModelTraitGenerator = $entityModelTraitGenerator;
    }

    public function setEntityModelTraitGeneratorRequestBuilder(
        EntityModelTraitGeneratorRequestBuilder $entityModelTraitGeneratorRequestBuilder
    ): void {
        $this->entityModelTraitGeneratorRequestBuilder = $entityModelTraitGeneratorRequestBuilder;
    }

    public function setPostEntityModelGenerator(Generator $postEntityModelGenerator): void
    {
        $this->postEntityModelGenerator = $postEntityModelGenerator;
    }

    public function setPostEntityModelGeneratorRequestBuilder(
        PostEntityModelGeneratorRequestBuilder $postEntityModelGeneratorRequestBuilder
    ): void {
        $this->postEntityModelGeneratorRequestBuilder = $postEntityModelGeneratorRequestBuilder;
    }
}
