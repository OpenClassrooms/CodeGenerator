<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\ViewModelDetailAssemblerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\ViewModelDetailAssemblerSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelDetailAssemblerSkeletonModelAssemblerImpl implements ViewModelDetailAssemblerSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseDetailResponseFileObject,
        FileObject $viewModelDetailFileObject,
        FileObject $viewModelDetailAssemblerFileObject
    ): ViewModelDetailAssemblerSkeletonModel
    {
        $skeletonModel = new ViewModelDetailAssemblerSkeletonModelImpl();
        $skeletonModel->className = $viewModelDetailAssemblerFileObject->getClassName();
        $skeletonModel->namespace = $viewModelDetailAssemblerFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelDetailAssemblerFileObject->getShortName();
        $skeletonModel->useCaseDetailResponseClassName = $useCaseDetailResponseFileObject->getClassName();
        $skeletonModel->useCaseDetailResponseShortName = $useCaseDetailResponseFileObject->getShortName();
        $skeletonModel->useCaseDetailResponseArgument = lcfirst($useCaseDetailResponseFileObject->getShortName());
        $skeletonModel->viewModelDetailShortName = $viewModelDetailFileObject->getShortName();

        return $skeletonModel;
    }
}
