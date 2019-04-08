<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\SelfGenerator;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author authorStub <author.stub@example.com>
 */
interface CustomSkeletonModelBuilder
{
    public function create(): CustomSkeletonModelBuilder;

    public function withDefaultObject(FileObject $customFileObject): CustomSkeletonModelBuilder;

    public function build(): CustomSkeletonModel;
}
