<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\SelfGenerator\Impl;

use OpenClassrooms\CodeGenerator\SkeletonModels\SelfGenerator\CustomSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\SelfGenerator\CustomSkeletonModelAssembler;

/**
 * @author authorStub <author.stub@example.com>
 */
class CustomSkeletonModelAssemblerImpl implements CustomSkeletonModelAssembler
{
    public function create(): CustomSkeletonModel
    {
        $skeletonModel = new CustomSkeletonModelImpl();

        // TODO assemble skeleton model

        return $skeletonModel;
    }
}
