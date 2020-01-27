<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface DeleteEntityControllerSkeletonModelAssembler
{
    public function create(
        FileObject $deleteEntityControllerFileObject,
        FileObject $deleteEntityFileObject,
        FileObject $deleteEntityRequestBuilderFileObject,
        FileObject $entityNotFoundExceptionFileObject
    ): DeleteEntityControllerSkeletonModel;
}
