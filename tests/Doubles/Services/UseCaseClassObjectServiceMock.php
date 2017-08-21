<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Services;

use OpenClassrooms\CodeGenerator\Services\Impl\UseCaseClassObjectServiceImpl;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class UseCaseClassObjectServiceMock extends UseCaseClassObjectServiceImpl
{
    public function __construct()
    {
        $this->setAppNamespace('OpenClassrooms\CodeGenerator\Tests\Doubles\src\App');
        $this->setBaseNamespace('OpenClassrooms\CodeGenerator\Tests\Doubles\src');
    }
}
