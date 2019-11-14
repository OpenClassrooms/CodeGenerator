<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelAssemblerTraitSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelAssemblerTraitSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelAssemblerTraitSkeletonModelAssemblerImpl implements ViewModelAssemblerTraitSkeletonModelAssembler
{
    public function create(
        FileObject $viewModelAssemblerTraitFileObject,
        FileObject $useCaseResponseFileObject,
        FileObject $viewModelFileObject
    ): ViewModelAssemblerTraitSkeletonModel {
        $skeletonModel = new ViewModelAssemblerTraitSkeletonModelImpl();
        $skeletonModel->className = $viewModelAssemblerTraitFileObject->getClassName();
        $skeletonModel->namespace = $viewModelAssemblerTraitFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelAssemblerTraitFileObject->getShortName();
        $skeletonModel->fields = $viewModelAssemblerTraitFileObject->getFields();
        $skeletonModel->useCaseResponseClassName = $useCaseResponseFileObject->getClassName();
        $skeletonModel->useCaseResponseShortName = $useCaseResponseFileObject->getShortName();
        $skeletonModel->useCaseResponseArgument = lcfirst($useCaseResponseFileObject->getEntity());
        $skeletonModel->viewModelShortName = $viewModelFileObject->getShortName();

        return $skeletonModel;
    }
}
