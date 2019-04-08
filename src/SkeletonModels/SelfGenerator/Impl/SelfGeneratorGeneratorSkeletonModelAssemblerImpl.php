<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\SelfGenerator\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\SelfGenerator\SelfGeneratorGeneratorSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\SelfGenerator\SelfGeneratorGeneratorSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class SelfGeneratorGeneratorSkeletonModelAssemblerImpl implements SelfGeneratorGeneratorSkeletonModelAssembler
{
    public function create(string $domain, string $entity): SelfGeneratorGeneratorSkeletonModel
    {
        $skeletonModel = new SelfGeneratorGeneratorSkeletonModelImpl();
        $skeletonModel->domain = $domain;
        $skeletonModel->entity = $entity;
        $skeletonModel->argument = lcfirst($entity);

        return $skeletonModel;
    }
}
