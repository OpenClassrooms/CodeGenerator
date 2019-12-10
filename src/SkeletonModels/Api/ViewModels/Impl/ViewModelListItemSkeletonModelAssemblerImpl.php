<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelListItemSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelListItemSkeletonModelAssembler;

class ViewModelListItemSkeletonModelAssemblerImpl implements ViewModelListItemSkeletonModelAssembler
{
    public function create(
        FileObject $viewModelListItemFileObject,
        FileObject $viewModelFileObject
    ): ViewModelListItemSkeletonModel {
        $skeletonModel = new ViewModelListItemSkeletonModelImpl();
        $skeletonModel->namespace = $viewModelListItemFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelListItemFileObject->getShortName();
        $skeletonModel->parentShortName = $viewModelFileObject->getShortName();

        return $skeletonModel;
    }
}
