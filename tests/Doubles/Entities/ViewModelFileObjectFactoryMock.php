<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities;

use OpenClassrooms\CodeGenerator\Entities\Impl\ViewModelFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

class ViewModelFileObjectFactoryMock extends ViewModelFileObjectFactoryImpl
{
    public function __construct()
    {
        $this->appDir = FixturesConfig::APP_DIR;
        $this->apiDir = FixturesConfig::API_DIR;
        $this->baseNamespace = FixturesConfig::BASE_NAMESPACE;
        $this->testsBaseNamespace = FixturesConfig::TEST_BASE_NAMESPACE;
        $this->stubNamespace = FixturesConfig::STUB_NAMESPACE;
    }
}
