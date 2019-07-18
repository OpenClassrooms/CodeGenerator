<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Doubles\BusinessRules\Gateways;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Gateways\DTO\Request\InMemoryEntityGatewayGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Gateways\InMemoryEntityGatewayGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Gateways\Request\InMemoryEntityGatewayGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Gateways\InMemoryEntityGatewayFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Tests\Doubles\BusinessRules\Gateways\InMemoryEntityGatewaySkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

/**
 * @author arnaud lefevre <arnaud.lefevre@openclassrooms.com>
 */
class InMemoryEntityGatewayGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var InMemoryEntityGatewayGenerator
     */
    private $inMemoryEntityGatewayGenerator;

    /**
     * @var InMemoryEntityGatewayGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->inMemoryEntityGatewayGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new InMemoryEntityGatewayFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $inMemoryEntityGatewayGeneratorRequestBuilderImpl = new InMemoryEntityGatewayGeneratorRequestBuilderImpl();
        $this->request = $inMemoryEntityGatewayGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->inMemoryEntityGatewayGenerator = new InMemoryEntityGatewayGenerator();
        $this->inMemoryEntityGatewayGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->inMemoryEntityGatewayGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->inMemoryEntityGatewayGenerator->setInMemoryEntityGatewaySkeletonModelAssembler(
            new InMemoryEntityGatewaySkeletonModelAssemblerMock()
        );
        $this->inMemoryEntityGatewayGenerator->setTemplating(new TemplatingServiceMock());
    }
}
