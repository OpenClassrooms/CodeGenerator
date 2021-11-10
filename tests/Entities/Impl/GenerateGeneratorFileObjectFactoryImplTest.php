<?php

declare(strict_types=1);

namespace Tests\FileObjects;

use OpenClassrooms\CodeGenerator\Entities\GenerateGeneratorFileObjectFactory;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGeneratorFileObjectFactoryMock;
use PHPUnit\Framework\TestCase;

class GenerateGeneratorFileObjectFactoryImplTest extends TestCase
{
    /**
     * @var GenerateGeneratorFileObjectFactory
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
        $this->factory = new GenerateGeneratorFileObjectFactoryMock();
    }
}
