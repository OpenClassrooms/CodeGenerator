<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders\UseCaseResponseStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders\UseCaseResponseStubSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class UseCaseResponseStubSkeletonModelAssemblerImpl implements UseCaseResponseStubSkeletonModelAssembler
{
    public function create(FileObject $responseStubFileObject): UseCaseResponseStubSkeletonModel
    {
        $skeletonModel = new UseCaseResponseStubSkeletonModelImpl();

        return $skeletonModel;
    }
}
