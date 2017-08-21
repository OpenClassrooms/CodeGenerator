<?php

namespace OpenClassrooms\CodeGenerator\Generator\App\Controller;

use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Services\ControllerClassObjectService;
use OpenClassrooms\CodeGenerator\Services\UseCaseClassObjectService;
use OpenClassrooms\CodeGenerator\Services\ViewModelClassObjectService;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
abstract class AbstractControllerGenerator extends AbstractGenerator
{
    /**
     * @var \OpenClassrooms\CodeGenerator\Services\ControllerClassObjectService
     */
    protected $controllerClassObjectService;

    /**
     * @var \OpenClassrooms\CodeGenerator\Services\UseCaseClassObjectService
     */
    protected $useCaseClassObjectService;

    /**
     * @var \OpenClassrooms\CodeGenerator\Services\ViewModelClassObjectService
     */
    protected $viewModelClassObjectService;

    public function setControllerClassObjectService(ControllerClassObjectService $controllerClassObjectService)
    {
        $this->controllerClassObjectService = $controllerClassObjectService;
    }

    public function setUseCaseClassObjectService(UseCaseClassObjectService $useCaseClassObjectService)
    {
        $this->useCaseClassObjectService = $useCaseClassObjectService;
    }

    public function setViewModelClassObjectService(ViewModelClassObjectService $viewModelClassObjectService)
    {
        $this->viewModelClassObjectService = $viewModelClassObjectService;
    }
}
