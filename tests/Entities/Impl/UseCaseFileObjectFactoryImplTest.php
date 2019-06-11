<?php declare(strict_types=1);

namespace Tests\FileObjects;

use OpenClassrooms\CodeGenerator\Entities\UseCaseFileObjectFactory;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseFileObjectFactoryMock;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseFileObjectFactoryImplTest extends TestCase
{
    /**
     * @var UseCaseFileObjectFactory
     */
    private $factory;

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function InvalidType_Create_ThrowException()
    {
        $this->factory->create('INVALID_TYPE', self::class, '');
    }

    protected function setUp()
    {
        $this->factory = new UseCaseFileObjectFactoryMock();
    }
}
