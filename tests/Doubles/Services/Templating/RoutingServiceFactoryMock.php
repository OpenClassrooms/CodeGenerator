<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating;

use OpenClassrooms\CodeGenerator\Utility\RoutingUtility;

class RoutingServiceFactoryMock extends RoutingUtility
{
    public function __construct()
    {
        $this->setBaseNamespace('OC\\');
    }
}
