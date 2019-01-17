<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\ViewModelDetailSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\ViewModelDetailSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
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
