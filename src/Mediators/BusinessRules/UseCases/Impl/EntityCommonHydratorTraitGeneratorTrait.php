<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\EntityCommonHydratorTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EntityCommonHydratorTraitGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Generator;

trait EntityCommonHydratorTraitGeneratorTrait
{
    /** @var EntityCommonHydratorTraitGenerator */
    private $entityCommonHydratorTraitGenerator;

    /** @var EntityCommonHydratorTraitGeneratorRequestBuilder */
    private $entityCommonHydratorTraitGeneratorRequestBuilder;

    public function generateEntityCommonHydratorTraitGenerator(string $className): FileObject
    {
        return $this->entityCommonHydratorTraitGenerator->generate(
            $this->entityCommonHydratorTraitGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()

        );
    }

    public function setEntityCommonHydratorTraitGenerator(
        Generator $entityCommonHydratorTraitGenerator
    ): void {
        $this->entityCommonHydratorTraitGenerator = $entityCommonHydratorTraitGenerator;
    }

    public function setEntityCommonHydratorTraitGeneratorRequestBuilder(
        EntityCommonHydratorTraitGeneratorRequestBuilder $entityCommonHydratorTraitGeneratorRequestBuilder
    ): void {
        $this->entityCommonHydratorTraitGeneratorRequestBuilder = $entityCommonHydratorTraitGeneratorRequestBuilder;
    }
}
