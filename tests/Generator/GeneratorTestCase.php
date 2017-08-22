<?php

namespace OpenClassrooms\CodeGenerator\Tests\Generator;

use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Services\Impl\FieldObjectServiceImpl;
use OpenClassrooms\CodeGenerator\Services\Impl\TemplatingFactoryImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Requestors\UseCaseRequest;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\UseCaseResponse;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\UseCase;
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
        $generator->setUseCaseInterfaceClassName(UseCase::class);
        $generator->setUseCaseRequestInterfaceClassName(UseCaseRequest::class);
        $generator->setUseCaseResponseInterfaceClassName(UseCaseResponse::class);
        $generator->setTemplating($templating);
        $generator->setFieldObjectService(new FieldObjectServiceImpl());

        return $generator;
    }
}
