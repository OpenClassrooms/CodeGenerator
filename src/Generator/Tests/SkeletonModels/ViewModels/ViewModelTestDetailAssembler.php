<?php

namespace OpenClassrooms\CodeGenerator\Generator\Tests\SkeletonModels\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Response\ViewModelTestDetailResponse;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelTestDetailAssembler
{
    public function create(ViewModelTestDetailResponse $viewModelTest): ViewModelTestDetail;
}
