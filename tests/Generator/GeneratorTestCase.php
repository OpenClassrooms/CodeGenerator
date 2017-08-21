<?php

namespace OpenClassrooms\CodeGenerator\Tests\Generator;

use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Services\Impl\FieldObjectServiceImpl;
use OpenClassrooms\CodeGenerator\Services\Impl\TemplatingFactoryImpl;
use PHPUnit\Framework\TestCase;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class GeneratorTestCase extends TestCase
{
    /**
     * @var \OpenClassrooms\CodeGenerator\Generator\AbstractGenerator
     */
    protected $generator;

    protected function setUp()
    {
        $this->buildGenerator($this->generator);
    }

    protected function buildGenerator(AbstractGenerator $generator): AbstractGenerator
    {
        $templatingFactory = new TemplatingFactoryImpl();
        $templating = $templatingFactory->create(
            ['author' => 'Romain Kuzniak', 'authorEmail' => 'romain.kuzniak@openclassrooms.com']
        );
        $generator->setTemplating($templating);
        $generator->setFieldObjectService(new FieldObjectServiceImpl());

        return $generator;
    }
}
