<?php

namespace OpenClassrooms\CodeGenerator\Tests\Generator;

use OpenClassrooms\CodeGenerator\Services\Impl\ClassObjectServiceImpl;
use OpenClassrooms\CodeGenerator\Services\Impl\FieldObjectServiceImpl;
use OpenClassrooms\CodeGenerator\Services\Impl\TemplatingFactoryImpl;
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
        $templatingFactory = new TemplatingFactoryImpl();
        $templating = $templatingFactory->create(['author' => 'Romain Kuzniak', 'authorEmail' => 'romain.kuzniak@openclassrooms.com']);
        $this->generator->setTemplating($templating);
        $classObjectService = new ClassObjectServiceImpl();
        $classObjectService->setAppNamespace('OpenClassrooms\CodeGenerator\Tests\Doubles\src\App');
        $classObjectService->setBaseNamespace('OpenClassrooms\CodeGenerator\Tests\Doubles\src');
        $this->generator->setClassObjectService($classObjectService);
        $this->generator->setFieldObjectService(new FieldObjectServiceImpl());
    }

}
