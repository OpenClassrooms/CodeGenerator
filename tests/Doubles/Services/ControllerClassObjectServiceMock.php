<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Services;

use OpenClassrooms\CodeGenerator\Services\Impl\ControllerClassObjectServiceImpl;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ControllerClassObjectServiceMock extends ControllerClassObjectServiceImpl
{
    public function __construct()
    {
        $this->setAppNamespace('OpenClassrooms\CodeGenerator\Tests\Doubles\src\App');
        $this->setBaseNamespace('OpenClassrooms\CodeGenerator\Tests\Doubles\src');
    }
}
