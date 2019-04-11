<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator\Impl;

use OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator\GenerateGeneratorGeneratorSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator\GenerateGeneratorGeneratorSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenerateGeneratorGeneratorSkeletonModelAssemblerImpl implements GenerateGeneratorGeneratorSkeletonModelAssembler
{
    /**
     * @var string
     */
    protected $baseNamespace;

    public function create(string $domain, string $entity): GenerateGeneratorGeneratorSkeletonModel
    {
        $skeletonModel = new GenerateGeneratorGeneratorSkeletonModelImpl();
        $skeletonModel->baseNamespace = $this->baseNamespace;
        $skeletonModel->domain = $domain;
        $skeletonModel->entity = $entity;
        $skeletonModel->argument = lcfirst($entity);

        return $skeletonModel;
    }

    public function setBaseNamespace(string $baseNamespace): void
    {
        $this->baseNamespace = $baseNamespace;
    }
}
