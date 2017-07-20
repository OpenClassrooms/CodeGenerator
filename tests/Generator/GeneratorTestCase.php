<?php

namespace OpenClassrooms\CodeGenerator\Tests\Generator;

use OpenClassrooms\CodeGenerator\Services\Impl\ClassObjectServiceImpl;
use OpenClassrooms\CodeGenerator\Services\Impl\FieldObjectServiceImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\TemplatingMock;
use PHPUnit\Framework\TestCase;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class GeneratorTestCase extends TestCase
{
    /**
     * @var \OpenClassrooms\CodeGenerator\Generator\Generator
     */
    protected $generator;

    protected function setUp()
    {
        $this->generator->setTemplating(new TemplatingMock());
        $this->generator->setClassObjectService(new ClassObjectServiceImpl());
        $this->generator->setFieldObjectService(new FieldObjectServiceImpl());
    }

}
