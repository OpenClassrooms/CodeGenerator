<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelDetailSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelDetailSkeletonModelAssembler;

class ViewModelDetailSkeletonModelAssemblerImpl implements ViewModelDetailSkeletonModelAssembler
{
    public function create(FileObject $viewModelDetailFileObject): ViewModelDetailSkeletonModel
    {
        $skeletonModel = new ViewModelDetailSkeletonModelImpl();
        $skeletonModel->className = $viewModelDetailFileObject->getClassName();
        $skeletonModel->namespace = $viewModelDetailFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelDetailFileObject->getShortName();
        $skeletonModel->fields = $viewModelDetailFileObject->getFields();

        return $skeletonModel;
    }
}
