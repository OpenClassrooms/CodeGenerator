<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator;

interface CustomSkeletonModelAssembler
{
    public function create(): CustomSkeletonModel;
}
