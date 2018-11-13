<?php

namespace OpenClassrooms\CodeGenerator\Generator\App\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\OldAbstractGenerator;
use OpenClassrooms\CodeGenerator\Services\ViewModelClassObjectService;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
abstract class OldAbstractViewModelGenerator extends OldAbstractGenerator
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
