<?php

namespace OpenClassrooms\CodeGenerator\Generator\Tests\SkeletonModels\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Response\ViewModelTestDetailResponse;
use OpenClassrooms\CodeGenerator\Generator\Tests\SkeletonModels\ViewModels\ViewModelTestDetail;
use OpenClassrooms\CodeGenerator\Generator\Tests\SkeletonModels\ViewModels\ViewModelTestDetailAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelTestDetailAssemblerImpl implements ViewModelTestDetailAssembler
{
    public function create(ViewModelTestDetailResponse $viewModelTest): ViewModelTestDetail
    {
        // TODO: Implement create() method.
    }

}
