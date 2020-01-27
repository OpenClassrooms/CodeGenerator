<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelDetailImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelDetailImplSkeletonModelAssembler;

class ViewModelDetailImplSkeletonModelAssemblerImpl implements ViewModelDetailImplSkeletonModelAssembler
{
    public function create(
        FileObject $viewModelDetailFileObject,
        FileObject $viewModelDetailImplFileObject
    ): ViewModelDetailImplSkeletonModel {
        $skeletonModel = new ViewModelDetailImplSkeletonModelImpl();
        $skeletonModel->className = $viewModelDetailImplFileObject->getClassName();
        $skeletonModel->namespace = $viewModelDetailImplFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelDetailImplFileObject->getShortName();
        $skeletonModel->parentClassName = $viewModelDetailFileObject->getClassName();
        $skeletonModel->parentShortName = $viewModelDetailFileObject->getShortName();

        return $skeletonModel;
    }
}
