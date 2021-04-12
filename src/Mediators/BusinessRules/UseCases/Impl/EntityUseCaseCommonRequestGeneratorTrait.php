<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\EntityUseCaseCommonRequestTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EntityUseCaseCommonRequestTraitGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Generator;

trait EntityUseCaseCommonRequestGeneratorTrait
{
    /** @var EntityUseCaseCommonRequestTraitGenerator */
    private $entityUseCaseCommonRequestTraitGenerator;

    /** @var EntityUseCaseCommonRequestTraitGeneratorRequestBuilder */
    private $entityUseCaseCommonRequestTraitGeneratorRequestBuilder;

    public function generateEntityUseCaseCommonRequestTraitGenerator(string $className): FileObject
    {
        return $this->entityUseCaseCommonRequestTraitGenerator->generate(
            $this->entityUseCaseCommonRequestTraitGeneratorRequestBuilder
                ->create()
                ->withEntityClassName($className)
                ->build()
        );
    }

    public function setEntityUseCaseCommonRequestTraitGenerator(
        Generator $entityUseCaseCommonRequestTraitGenerator
    ): void {
        $this->entityUseCaseCommonRequestTraitGenerator = $entityUseCaseCommonRequestTraitGenerator;
    }

    public function setEntityUseCaseCommonRequestTraitGeneratorRequestBuilder(
        EntityUseCaseCommonRequestTraitGeneratorRequestBuilder $entityUseCaseCommonRequestTraitGeneratorRequestBuilder
    ): void {
        $this->entityUseCaseCommonRequestTraitGeneratorRequestBuilder = $entityUseCaseCommonRequestTraitGeneratorRequestBuilder;
    }
}
