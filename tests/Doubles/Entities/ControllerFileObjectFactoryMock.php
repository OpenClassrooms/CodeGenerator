<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities;

use OpenClassrooms\CodeGenerator\Entities\Impl\ControllerFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

class ControllerFileObjectFactoryMock extends ControllerFileObjectFactoryImpl
{
    public function __construct()
    {
        $this->apiDir = FixturesConfig::API_DIR;
        $this->baseNamespace = FixturesConfig::BASE_NAMESPACE;
    }
}
