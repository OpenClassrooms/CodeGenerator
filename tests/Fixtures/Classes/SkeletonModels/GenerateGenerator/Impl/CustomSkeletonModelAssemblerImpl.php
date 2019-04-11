<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator\Impl;

use OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator\CustomSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator\CustomSkeletonModelAssembler;

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
