<?php

namespace OpenClassrooms\CodeGenerator\Generator\App\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Services\ViewModelClassObjectService;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
abstract class AbstractViewModelGenerator extends AbstractGenerator
{
    /**
     * @var \OpenClassrooms\CodeGenerator\Services\ViewModelClassObjectService
     */
    protected $viewModelClassObjectService;

    public function setViewModelClassObjectService(ViewModelClassObjectService $viewModelClassObjectService)
    {
        $this->viewModelClassObjectService = $viewModelClassObjectService;
    }
}
