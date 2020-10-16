<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelDetailStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelDetailStubSkeletonModelAssembler;

final class ViewModelDetailStubSkeletonModelAssemblerImpl implements ViewModelDetailStubSkeletonModelAssembler
{
    use StubSkeletonAssemblerTrait;

    public function create(
        FileObject $viewModelDetailStubFileObject,
        FileObject $viewModelDetailFileObject,
        FileObject $useCaseDetailResponseStubFileObject
    ): ViewModelDetailStubSkeletonModel {
        $skeletonModel = new ViewModelDetailStubSkeletonModelImpl();
        $skeletonModel->className = $viewModelDetailStubFileObject->getClassName();
        $skeletonModel->namespace = $viewModelDetailStubFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelDetailStubFileObject->getShortName();
        $skeletonModel->fields = $viewModelDetailStubFileObject->getFields();
        $skeletonModel->constants = $viewModelDetailStubFileObject->getConsts();
        $skeletonModel->parentClassName = $viewModelDetailFileObject->getClassName();
        $skeletonModel->parentShortName = $viewModelDetailFileObject->getShortName();
        $skeletonModel->useCaseDetailResponseStubClassName = $useCaseDetailResponseStubFileObject->getClassName();
        $skeletonModel->hasConstructor = $this->hasConstructor($viewModelDetailStubFileObject->getFields());
        $skeletonModel->dateTimeType = $this->getDateTimeType();

        return $skeletonModel;
    }
}
