<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities;

use OpenClassrooms\CodeGenerator\Entities\Impl\SelfGeneratorFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class SelfGeneratorObjectFactoryMock extends SelfGeneratorFileObjectFactoryImpl
{
    public function __construct()
    {
        $this->appDir = FixturesConfig::APP_DIR;
        $this->apiDir = FixturesConfig::API_DIR;
        $this->baseNamespace = FixturesConfig::BASE_NAMESPACE_SELF_GENERATOR;
        $this->testsBaseNamespace = FixturesConfig::TEST_BASE_NAMESPACE_SELF_GENERATOR;
        $this->stubNamespace = FixturesConfig::STUB_NAMESPACE_SELF_GENERATOR;
    }
}
