<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface CustomSkeletonModelBuilder
{
    public function create(): CustomSkeletonModelBuilder;

    public function withDefaultObject(FileObject $customFileObject): CustomSkeletonModelBuilder;

    public function build(): CustomSkeletonModel;
}
