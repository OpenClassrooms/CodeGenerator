<?php

declare(strict_types=1);

namespace Tests\FileObjects;

use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectFactory;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseRequestFileObjectFactoryMock;
use PHPUnit\Framework\TestCase;

class UseCaseRequestFileObjectFactoryImplTest extends TestCase
{
    /**
     * @var UseCaseRequestFileObjectFactory
     */
    private $factory;

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
        $this->factory = new UseCaseRequestFileObjectFactoryMock();
    }
}
