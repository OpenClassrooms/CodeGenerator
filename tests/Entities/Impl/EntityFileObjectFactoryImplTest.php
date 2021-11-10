<?php

declare(strict_types=1);

namespace Tests\FileObjects;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectFactory;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use PHPUnit\Framework\TestCase;

class EntityFileObjectFactoryImplTest extends TestCase
{
    private EntityFileObjectFactory $factory;

    /**
     * @test
     */
    public function InvalidType_Create_ThrowException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->factory->create('INVALID_TYPE', self::class, '');
    }

    protected function setUp(): void
    {
        $this->factory = new EntityFileObjectFactoryMock();
    }
}
