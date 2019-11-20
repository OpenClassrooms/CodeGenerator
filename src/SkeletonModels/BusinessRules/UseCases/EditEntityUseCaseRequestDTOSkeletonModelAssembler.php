<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface EditEntityUseCaseRequestDTOSkeletonModelAssembler
{
    public function create(
        FileObject $editEntityUseCaseRequestFileObject,
        FileObject $editEntityUseCaseRequestDTOFileObject
    ): EditEntityUseCaseRequestDTOSkeletonModel;
}
