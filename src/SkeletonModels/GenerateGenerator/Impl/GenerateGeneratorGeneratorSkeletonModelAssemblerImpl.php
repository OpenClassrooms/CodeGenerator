<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator\Impl;

use OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator\GenerateGeneratorGeneratorSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator\GenerateGeneratorGeneratorSkeletonModelAssembler;

class GenerateGeneratorGeneratorSkeletonModelAssemblerImpl implements GenerateGeneratorGeneratorSkeletonModelAssembler
{
    /**
     * @var string
     */
    protected $baseNamespace;

    public function create(
        string $domain,
        string $entity,
        string $constructionPattern
    ): GenerateGeneratorGeneratorSkeletonModel {
        $skeletonModel = new GenerateGeneratorGeneratorSkeletonModelImpl();
        $skeletonModel->baseNamespace = $this->baseNamespace;
        $skeletonModel->domain = $domain;
        $skeletonModel->entity = $entity;
        $skeletonModel->argument = lcfirst($entity);
        $skeletonModel->constructionPattern = ucfirst($constructionPattern);

        return $skeletonModel;
    }

    public function setBaseNamespace(string $baseNamespace): void
    {
        $this->baseNamespace = $baseNamespace;
    }
}
