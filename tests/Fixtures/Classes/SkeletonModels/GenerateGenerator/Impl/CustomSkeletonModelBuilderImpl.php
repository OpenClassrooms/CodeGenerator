<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator\CustomSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator\CustomSkeletonModelBuilder;

class CustomSkeletonModelBuilderImpl implements CustomSkeletonModelBuilder
{
    /**
     * @var CustomSkeletonModel
     */
    private $skeletonModel;

    public function create(): CustomSkeletonModelBuilder
    {
        $this->skeletonModel = new CustomSkeletonModelImpl();

        return $this;
    }

    public function withDefaultObject(FileObject $customFileObject): CustomSkeletonModelBuilder
    {
        //TODO implement

        return $this;
    }

    public function build(): CustomSkeletonModel
    {
        //TODO implement

        return $this->skeletonModel;
    }
}
