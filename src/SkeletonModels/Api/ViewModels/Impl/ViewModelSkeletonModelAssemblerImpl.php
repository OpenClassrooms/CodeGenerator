<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelSkeletonModelAssemblerImpl implements ViewModelSkeletonModelAssembler
{
    public function create(FileObject $viewModelFileObject): ViewModelSkeletonModel
    {
        $skeletonModel = new ViewModelSkeletonModelImpl();
        $skeletonModel->className = $viewModelFileObject->getClassName();
        $skeletonModel->namespace = $viewModelFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelFileObject->getShortName();
        $skeletonModel->fields = $viewModelFileObject->getFields();

        return $skeletonModel;
    }
}
