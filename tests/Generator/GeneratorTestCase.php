<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator;

use OpenClassrooms\CodeGenerator\Generator\OldAbstractGenerator;
use OpenClassrooms\CodeGenerator\Services\Impl\FieldObjectServiceImpl;
use OpenClassrooms\CodeGenerator\Services\Impl\TemplatingServiceImpl;
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
     * @var \OpenClassrooms\CodeGenerator\Generator\OldAbstractGenerator
     */
    protected $generator;

    protected function buildGenerator(OldAbstractGenerator $generator): OldAbstractGenerator
    {
        $templatingFactory = new TemplatingServiceImpl();
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

    protected function setUp()
    {
        $this->buildGenerator($this->generator);
    }
}
