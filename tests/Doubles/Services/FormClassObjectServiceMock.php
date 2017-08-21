<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Services;

use OpenClassrooms\CodeGenerator\Services\Impl\FormClassObjectServiceImpl;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class FormClassObjectServiceMock extends FormClassObjectServiceImpl
{
    public function __construct()
    {
        $this->setAppNamespace('OpenClassrooms\CodeGenerator\Tests\Doubles\src\App');
        $this->setBaseNamespace('OpenClassrooms\CodeGenerator\Tests\Doubles\src');
    }
}
