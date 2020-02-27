<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating;

use OpenClassrooms\CodeGenerator\Services\Impl\RoutingFactoryServiceImpl;

class RoutingServiceFactoryMock extends RoutingFactoryServiceImpl
{
    public function __construct()
    {
        $this->setBaseNamespace('OC\\');
    }
}
