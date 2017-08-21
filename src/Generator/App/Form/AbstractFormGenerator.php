<?php

namespace OpenClassrooms\CodeGenerator\Generator\App\Form;

use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Services\ControllerClassObjectService;
use OpenClassrooms\CodeGenerator\Services\FormClassObjectService;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
abstract class AbstractFormGenerator extends AbstractGenerator
{
    /**
     * @var \OpenClassrooms\CodeGenerator\Services\ControllerClassObjectService
     */
    protected $controllerClassObjectService;

    /**
     * @var \OpenClassrooms\CodeGenerator\Services\FormClassObjectService
     */
    protected $formClassObjectService;

    public function setControllerClassObjectService(ControllerClassObjectService $controllerClassObjectService)
    {
        $this->controllerClassObjectService = $controllerClassObjectService;
    }

    public function setFormClassObjectService(FormClassObjectService $formClassObjectService)
    {
        $this->formClassObjectService = $formClassObjectService;
    }
}
