<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\SelfGenerator\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\SelfGenerator\CustomSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\SelfGenerator\CustomSkeletonModelBuilder;

/**
 * @author authorStub <author.stub@example.com>
 */
class CustomSkeletonModelBuilderImpl implements CustomSkeletonModelBuilder
{
    use UseCaseClassNameTrait;

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
