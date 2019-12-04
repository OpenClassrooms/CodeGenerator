<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\BusinessRules\Gateways;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\DTO\Request\EntityGatewayGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\EntityGatewayGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request\EntityGatewayGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Gateways\EntityGatewayFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Gateways\EntityGatewaySkeletonModelAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\TestCase;

class EntityGatewayGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var EntityGatewayGenerator
     */
    private $entityGatewayGenerator;

    /**
     * @var EntityGatewayGeneratorRequestBuilder
     */
    private $request;

    /**
     * @test
     */
    public function generate_ReturnFileObject(): void
    {
        $actualFileObject = $this->entityGatewayGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new EntityGatewayFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $entityGatewayGeneratorRequestBuilderImpl = new EntityGatewayGeneratorRequestBuilderImpl();
        $this->request = $entityGatewayGeneratorRequestBuilderImpl
            ->create()
            ->withEntityClassName(FunctionalEntity::class)
            ->build();

        $this->entityGatewayGenerator = new EntityGatewayGenerator();

        $this->entityGatewayGenerator->setEntityGatewaySkeletonModelAssembler(
            new EntityGatewaySkeletonModelAssemblerMock()
        );
        $this->entityGatewayGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->entityGatewayGenerator->setTemplating(new TemplatingServiceMock());
        $this->entityGatewayGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
    }
}
